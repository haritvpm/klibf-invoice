<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('payment')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }
}
