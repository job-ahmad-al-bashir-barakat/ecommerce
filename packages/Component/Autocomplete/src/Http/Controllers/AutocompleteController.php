<?php

namespace Component\Autocomplete\Http\Controllers;

use Component\Autocomplete\Http\Handler\Autocomplete;
use Illuminate\Http\Request;
use Exception;
use Route;

class AutocompleteController
{
    protected $autocomplete;

    protected $model;

    protected $with;

    protected $data;

    protected $q;

    protected $conditions;

    protected $colId;

    protected $colName;

    protected $extraData = [];

    protected $order;

    public function __construct()
    {
        $this->initModel();
    }

    function autocomplete(Request $request, $model)
    {
        $model = $this->model;

        $object = new $model();

        // add search to query object
        if($this->q)
        {
            if(is_callable($this->q))
            {
                $object = call_user_func($this->q ,$request ,$object);
            }
            else
            {
                foreach ($this->q as $whereHasOrIndex => $col)
                {
                    $q = str_replace(' ', '%', request()->input('q', ''));

                    if(!is_numeric($whereHasOrIndex)) {
                        $object = $object->whereHas($whereHasOrIndex ,function ($query) use ($col ,$q) {
                            $query->where($col, 'like', '%' . $q . '%');
                        });
                    } else {
                        $object = $object->where($col, 'like', '%' . $q . '%');
                    }
                }
            }
        }

        // add conditions to query object
        if(!empty($this->conditions))
        {
            if(is_callable($this->conditions))
            {
                $object = call_user_func($this->conditions ,$request ,$object);
            }
            else
            {
                foreach ($this->conditions as $whereHasOrIndex => $condition) {

                    $pattern = '/.+:/';
                    // get real value
                    $value = preg_replace($pattern ,'',$condition[2]);
                    // get value type
                    preg_match($pattern ,$condition[2] ,$type);

                    if(!empty($type)) {

                        $type = substr($type[0], 0, -1);
                        switch ($type) {
                            case 'request' : $value = \request()->input($value ,'');
                        }
                    }

                    // condition
                    if(!is_numeric($whereHasOrIndex)) {

                        if($value)
                            $object = $object->whereHas($whereHasOrIndex ,function ($query) use ($condition ,$value) {

                                $query->where($condition[0] ,$condition[1] ,$value);
                            });

                    } else {

                        if($value)
                            $object = $object->where($condition[0] ,$condition[1] ,$value);
                    }
                }
            }
        }

        // add handler conditions to query object
        $handler = function ($request ,$object) {

            $class  = new Autocomplete();
            $method = $this->autocomplete;

            if(method_exists($class ,$method))
                $object = $class->$method($request ,$object);

            return $object;
        };

        $object = $handler($request ,$object);

        // add order to query object
        if(!empty($this->order))
            $object->orderBy($this->order[0],isset($this->order[1]) ? $this->order[1] : 'asc');

        // add relation to query object
        if(!empty($this->with))
            $object->with($this->with);

        // call object
        $data = $object->get();

        // get relation data from model object to show on autocomplete
        if($object->count() && $this->data)
            $data = $object->first()->{$this->data};

        $result = [];

        // func for get perperty from relation
        $getRelationProperty = function ($item ,$col) {

            foreach (explode('.', $col) as $col)
                $item = isset($item->$col) ? $item->$col : $item->first()[$col];

            return $item;
        };
        // func for replace {lang} when it is exists
        $replaceLang = function ($col) {

            return str_replace('{lang}' ,\App::getLocale() ,$col);
        };

        // filter over $object to fill data in autocomplete
        $data->each(function ($item ,$index) use (&$result ,$getRelationProperty ,$replaceLang) {

            // get id
            $id = $getRelationProperty($item,$this->colId);
            $value = function ($item ,$cols)  use ($getRelationProperty, $replaceLang){

                if(is_array($cols))
                {
                    $result = [];
                    foreach ($cols as $col)
                        $result[] = $getRelationProperty($item ,$replaceLang($col));

                    $result = implode(' ,' ,$result);
                }
                else
                    $result = $getRelationProperty($item ,$replaceLang($cols));

                return $result;
            };

            // get name
            $name  = $value($item,$this->colName);

            $result[$index]['id']         = $id;
            $result[$index]['name']       = $name;

            if(count($this->extraData))
                foreach ($this->extraData as $extraDataIndex => $extraData)
                {
                    $result[$index][$extraDataIndex] = $value($item,$extraData);
                }
        });

        return array('items' => $result);
    }

    /**
     *
     * This action for store tags
     *
     * @param Request $request
     * @param $model
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Response|\Symfony\Component\HttpFoundation\Response
     */
    function store(Request $request, $model)
    {
        $model = $this->model;

        $model::create([
            "{$this->colName}" => $request->input('value'),
        ]);
    }

    /**
     * @throws Exception
     */
    private function initModel()
    {
        if(Route::getCurrentRoute() !== null)
        {
            $this->autocomplete = Route::getCurrentRoute()->parameter('model');

            $autocompleteSet = config('autocompleteModels.' . $this->autocomplete);

            if (!$autocompleteSet) {
                throw new Exception('This model not registered');
            }

            $this->model       = isset($autocompleteSet['model'])       ? $autocompleteSet['model']       : '';
            $this->data        = isset($autocompleteSet['data'])        ? $autocompleteSet['data']        : false;
            $this->with        = isset($autocompleteSet['with'])        ? $autocompleteSet['with']        : [];
            $this->q           = isset($autocompleteSet['q'])           ? $autocompleteSet['q']           : config("autocomplete.default.q");
            $this->conditions  = isset($autocompleteSet['conditions'])  ? $autocompleteSet['conditions']  : [];
            $this->colId       = isset($autocompleteSet['colId'])       ? $autocompleteSet['colId']       : config("autocomplete.default.colId");
            $this->colName     = isset($autocompleteSet['colName'])     ? $autocompleteSet['colName']     : config("autocomplete.default.colName");
            $this->extraData   = isset($autocompleteSet['extraData'])   ? $autocompleteSet['extraData']   : [];
            $this->order       = isset($autocompleteSet['order'])       ? $autocompleteSet['order']       : [];
        }
    }
}