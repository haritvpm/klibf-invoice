<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookFestsTable extends Migration
{
    public function up()
    {
        Schema::create('book_fests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->date('from');
            $table->date('to');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
