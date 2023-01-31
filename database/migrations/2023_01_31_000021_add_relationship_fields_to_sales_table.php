<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('bookfest_id')->nullable();
            $table->foreign('bookfest_id', 'bookfest_fk_7945251')->references('id')->on('book_fests');
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->foreign('publisher_id', 'publisher_fk_7945252')->references('id')->on('publishers');
        });
    }
}
