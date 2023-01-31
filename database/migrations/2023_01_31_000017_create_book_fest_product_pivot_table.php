<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookFestProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('book_fest_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_7952820')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('book_fest_id');
            $table->foreign('book_fest_id', 'book_fest_id_fk_7952820')->references('id')->on('book_fests')->onDelete('cascade');
        });
    }
}
