<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('hsn')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('taxpercent_cgst', 15, 2)->nullable();
            $table->decimal('taxpercent_sgst', 15, 2)->nullable();
            $table->timestamps();
        });
    }
}
