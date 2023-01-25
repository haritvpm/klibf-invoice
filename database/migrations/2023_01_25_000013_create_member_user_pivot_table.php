<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('member_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7914613')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id', 'member_id_fk_7914613')->references('id')->on('members')->onDelete('cascade');
        });
    }
}
