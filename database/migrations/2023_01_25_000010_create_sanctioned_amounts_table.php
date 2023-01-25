<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionedAmountsTable extends Migration
{
    public function up()
    {
        Schema::create('sanctioned_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('as_amount', 15, 2);
            $table->timestamps();
        });
    }
}
