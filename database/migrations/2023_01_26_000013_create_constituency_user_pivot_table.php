<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstituencyUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('constituency_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7925827')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('constituency_id');
            $table->foreign('constituency_id', 'constituency_id_fk_7925827')->references('id')->on('constituencies')->onDelete('cascade');
        });
    }
}
