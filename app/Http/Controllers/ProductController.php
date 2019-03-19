<?php

namespace App\Http\Controllers;

use App\Author;
use App\DataTables\ProductDataTable;
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

    private function objectForm() {

        return [
            'categoryType'  => CategoryType::all()->pluck('name','id'),
            'productSeries' => ProductSeries::all()->pluck('name','id'),
            'author'        => Author::all()->pluck('name','id'),
            'publisher'     => Publisher::all()->pluck('name','id'),
        ];
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
    public function store(Request $request)
    {
        //
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
        return view('control.product.edit',['id' => $id])->with($this->objectForm());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
