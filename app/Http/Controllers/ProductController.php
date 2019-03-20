<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Publisher;
use Illuminate\Http\Request;
use App\CategoryType;
use App\ProductSeries;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $datatable)
    {
        return $datatable->render('control.product.index');
    }

    private function objectForm()
    {
        return [
            'categoryType'  => CategoryType::all()->pluck('name','id'),
            'productSeries' => ProductSeries::all()->pluck('name','id'),
            'author'        => Author::all()->pluck('name','id'),
            'publisher'     => Publisher::all()->pluck('name','id'),
        ];
    }

    private function data()
    {
        $data = [
            "product_name"          => request()->get('product_name'),
            "category_type_id"      => request()->get('category_type'),
            "category_id"           => request()->get('category'),
            "product_series_id"     => request()->get('product_series'),
            "author_id"             => request()->get('author'),
            "author_role_id"        => request()->get('author_role'),
            "publisher_id"          => request()->get('publisher'),
            "publisher_role_id"     => request()->get('publisher_role'),
            "selling_price"         => request()->get('selling_price'),
            "cost_price"            => request()->get('cost_price'),
            "product_isbn"          => request()->get('isbn'),
            "product_barcode"       => request()->get('barcode'),
            "product_type_id"       => request()->get('product_type'),
            "edition"               => request()->get('edition'),
            "cover_type_id"         => request()->get('cover_type'),
            "product_size_id"       => request()->get('product_size'),
            "product_weight"        => request()->get('product_weight'),
            "nb_of_pages"           => request()->get('nb_of_pages'),
            "release_date"          => request()->get('release_date'),
            "ebook"                 => request()->get('ebook'),
            "audio"                 => request()->get('audio'),
            "description"           => request()->get('description'),
        ];

        $fileName = $this->upload('product_image');

        if($fileName)
            $data["product_image"] = $fileName;

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control.product.create')->with($this->objectForm());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($this->data());

        if($request->ajax())
            return response()->json(['redirect' => \Redirect::action('ProductController@index')->getTargetUrl()]);

        return \Redirect::action('ProductController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::with(['authorRole','publisherRole','productType','coverType','productSize'])->where('id',$id)->first();

        if(!$model)
            abort('404');

        $category = Category::where('category_type_id' ,$model->category_type_id)->get()->pluck('name','id');

        return view('control.product.edit',[
            'id'       => $id,
            'model'    => $model,
            'category' => $category
        ])->with($this->objectForm());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($this->data());

        if($request->ajax())
            return response()->json(['redirect' => \Redirect::action('ProductController@index')->getTargetUrl()]);

        return \Redirect::action('ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
    }
}
