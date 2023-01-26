<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMemberFundsTable extends Migration
{
    public function up()
    {
        Schema::table('member_funds', function (Blueprint $table) {
            $table->unsignedBigInteger('bookfest_id')->nullable();
            $table->foreign('bookfest_id', 'bookfest_fk_7928632')->references('id')->on('book_fests');
            $table->unsignedBigInteger('constituency_id')->nullable();
            $table->foreign('constituency_id', 'constituency_fk_7928633')->references('id')->on('constituencies');
            $table->unsignedBigInteger('mla_id')->nullable();
            $table->foreign('mla_id', 'mla_fk_7928634')->references('id')->on('mlas');
        });
    }
}
