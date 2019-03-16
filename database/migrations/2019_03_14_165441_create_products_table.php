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
            $table->string('product_image')->nullable();
            $table->unsignedInteger('category_type_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('product_series_id')->nullable();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('author_role_id');
            $table->unsignedInteger('publisher_id');
            $table->unsignedInteger('publisher_role_id');

            $table->unsignedInteger('selling_price');
            $table->unsignedInteger('cost_price');

            $table->string('product_isbn')->nullable();
            $table->string('product_barcode')->nullable();

            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('edition')->nullable();
            $table->unsignedInteger('cover_type_id')->nullable();
            $table->unsignedInteger('product_size_id')->nullable();
            $table->string('product_weight')->nullable();
            $table->unsignedInteger('nb_of_pages')->nullable();
            $table->dateTime('release_date')->nullable();

            $table->string('ebook')->nullable();
            $table->string('audio')->nullable();

            $table->text('description')->nullable();

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
