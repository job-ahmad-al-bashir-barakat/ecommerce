<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends \Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_image',
        'category_type_id',
        'category_id',
        'product_series_id',
        'author_id',
        'author_role_id',
        'publisher_id',
        'publisher_role_id',
        'selling_price',
        'cost_price',
        'product_isbn',
        'product_barcode',
        'product_type_id',
        'edition',
        'cover_type_id',
        'product_size_id',
        'product_weight',
        'nb_of_pages',
        'release_date',
        'ebook',
        'audio',
        'description',
    ];

    protected $casts = [
        'release_date' => 'datetime:Y-m-d',
    ];

    protected $appends = ['product_image_path'];

    public function getProductImagePathAttribute()
    {
        return $this->product_image ? url(\Storage::url("image/$this->product_image")) : '';
    }

    function author() {

        return $this->belongsTo(Author::class);
    }

    function authorRole() {

        return $this->belongsTo(AuthorRole::class);
    }

    function publisher() {

        return $this->belongsTo(Publisher::class);
    }

    function publisherRole() {

        return $this->belongsTo(PublisherRole::class);
    }

    function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    function coverType()
    {
        return $this->belongsTo(CoverType::class);
    }

    function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
