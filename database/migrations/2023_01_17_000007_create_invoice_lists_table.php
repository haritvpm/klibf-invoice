<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceListsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->nullable();
            $table->string('institution_type');
            $table->string('institution_name');
            $table->decimal('amount_allotted', 15, 2)->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }
}
