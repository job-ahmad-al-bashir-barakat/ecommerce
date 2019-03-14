<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product_name');
            $table->string('product_image');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sub_category_id');
            $table->unsignedInteger('product_series_id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('author_role_id');
            $table->unsignedInteger('publisher_id');
            $table->unsignedInteger('publisher_role_id');

            $table->unsignedInteger('selling_price');
            $table->unsignedInteger('cost_price');

            $table->string('product_isbn');
            $table->string('product_barcode');

            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('edition');
            $table->unsignedInteger('cover_type_id');
            $table->unsignedInteger('product_size_id');
            $table->unsignedInteger('product_weight');
            $table->unsignedInteger('nb_of_pages');
            $table->dateTime('release_date');

            $table->string('ebook');
            $table->string('audio');

            $table->text('description');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
