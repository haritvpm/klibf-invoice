<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoiceListsTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('member_fund_id')->nullable();
            $table->foreign('member_fund_id', 'member_fund_fk_7928653')->references('id')->on('member_funds');
            $table->unsignedBigInteger('bookfest_id')->nullable();
            $table->foreign('bookfest_id', 'bookfest_fk_7920203')->references('id')->on('book_fests');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_7904741')->references('id')->on('users');
        });
    }
}
