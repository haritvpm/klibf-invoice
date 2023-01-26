<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlasTable extends Migration
{
    public function up()
    {
        Schema::create('mlas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_mal')->nullable();
            $table->timestamps();
        });
    }
}
