<?php

if(! function_exists('autAutocompleteEval'))
{
    function autAutocompleteEval($object ,$multi = false ,$id = 'id' ,$name = 'name') {

        if(is_null($object))
        {
            return [];
        }
        else
        {
            if ($multi)
                return $object->pluck(autAutocompleteLang($name), $id)->toArray();
            else
                return [$object->$id => $object->{autAutocompleteLang($name)}];
        }
    }
}
