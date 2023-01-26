<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberFundsTable extends Migration
{
    public function up()
    {
        Schema::create('member_funds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('as_amount', 15, 2)->nullable();
            $table->timestamps();
        });
    }
}
