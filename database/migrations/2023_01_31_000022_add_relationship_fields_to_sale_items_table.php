<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSaleItemsTable extends Migration
{
    public function up()
    {
        Schema::table('sale_items', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_7945264')->references('id')->on('products');
            $table->unsignedBigInteger('invoice_number_id')->nullable();
            $table->foreign('invoice_number_id', 'invoice_number_fk_7945363')->references('id')->on('sales');
        });
    }
}
