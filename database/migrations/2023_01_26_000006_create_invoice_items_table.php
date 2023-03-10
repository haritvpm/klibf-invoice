<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_number');
            $table->date('bill_date');
            $table->decimal('gross', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('amount', 15, 2);
            $table->timestamps();
        });
    }
}
