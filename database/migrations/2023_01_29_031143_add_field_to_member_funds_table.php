<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_funds', function (Blueprint $table) {
              $table->decimal('as_amount_next', 15, 2)->nullable();
        });


        if (Schema::hasColumn('member_funds', 'financial_year'))
        {
            Schema::table('member_funds', function (Blueprint $table)
            {
                $table->dropColumn('financial_year');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_funds', function (Blueprint $table) {
            //
        });
    }
};
