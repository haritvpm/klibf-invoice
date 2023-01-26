<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('bookfest_id')->nullable();
            $table->foreign('bookfest_id', 'bookfest_fk_7922919')->references('id')->on('book_fests');
            $table->unsignedBigInteger('constituency_id')->nullable();
            $table->foreign('constituency_id', 'constituency_fk_7925825')->references('id')->on('constituencies');
        });
    }
}