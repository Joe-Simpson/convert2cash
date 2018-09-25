<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFieldsToBuyback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buybacks', function (Blueprint $table) {
            $table->boolean('cancelled')->default(false)->nullable();
            // will link to a buyback record for renewed
            $table->integer('renew_id')->nullable();
            $table->date('renew_date')->nullable();
            $table->date('bought_back_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buybacks', function (Blueprint $table) {
            $table->dropColumn('cancelled');
            $table->dropColumn('renew_id');
            $table->dropColumn('renew_date');
            $table->dropColumn('bought_back_date');
        });
    }
}
