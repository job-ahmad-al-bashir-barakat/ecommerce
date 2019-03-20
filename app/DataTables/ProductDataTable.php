<?php

namespace App\DataTables;

use App\Product;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($item) {

                if ($item->deleted_at) {
                    $update = '<span></span>';
                    $deleteStatus = '<span class="text-danger p-2"><i class="fas fa-ban"></i></span>';
                } else {
                    $update = '<a href="' . action('ProductController@edit', ['id' => $item->id]) . '" class="text-muted p-2"><i class="fas fa-bars"></i></a>';
                    $deleteStatus = '<span class="text-success p-2"><i class="fas fa-check"></i></span>';
                }

                return "
                    <div class='d-flex justify-content-between'>
                        {$update}
                        {$deleteStatus}
                    </div> 
                ";
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model::with(['publisher','author', 'authorRole', 'publisherRole', 'productType', 'coverType', 'productSize'])
            ->withTrashed()
            ->get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction([
                'data' => 'action',
                'title' => '<a href="' . action('ProductController@create') . '" class="btn btn-link text-success"><i class="fas fa-plus"></i></a>',
            ], true)
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'product_name', 'title' => 'Product Name'],
            ['data' => 'product_type.name', 'title' => 'Product Type'],
            ['data' => 'author.name', 'title' => 'Author'],
            ['data' => 'publisher.name', 'title' => 'Publisher'],
            ['data' => 'selling_price', 'title' => 'Selling Price'],
            ['data' => 'cost_price', 'title' => 'Cost Price'],
            ['data' => 'edition', 'title' => 'Edition'],
            ['data' => 'cover_type.name', 'title' => 'Cover Type'],
            ['data' => 'product_size.name', 'title' => 'Product Size'],
            ['data' => 'product_weight', 'title' => 'Product Weight'],
            ['data' => 'nb_of_pages', 'title' => '#Nb Of Pages'],
            ['data' => 'release_date', 'title' => 'Release Date'],
            ['data' => 'ebook', 'title' => 'E-Book'],
            ['data' => 'audio', 'title' => 'Audio'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
