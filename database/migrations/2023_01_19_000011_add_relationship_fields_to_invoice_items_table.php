<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_list_id')->nullable();
            $table->foreign('invoice_list_id', 'invoice_list_fk_7896107')->references('id')->on('invoice_lists');
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->foreign('publisher_id', 'publisher_fk_7896100')->references('id')->on('publishers');
        });
    }
}
