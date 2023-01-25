<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSanctionedAmountsTable extends Migration
{
    public function up()
    {
        Schema::table('sanctioned_amounts', function (Blueprint $table) {
            $table->unsignedBigInteger('fin_year_id')->nullable();
            $table->foreign('fin_year_id', 'fin_year_fk_7920243')->references('id')->on('financial_years');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id', 'member_fk_7920309')->references('id')->on('members');
            $table->unsignedBigInteger('book_fest_id')->nullable();
            $table->foreign('book_fest_id', 'book_fest_fk_7920325')->references('id')->on('book_fests');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_7920214')->references('id')->on('users');
        });
    }
}
