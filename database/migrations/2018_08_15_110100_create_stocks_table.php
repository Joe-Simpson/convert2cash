<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->string('description')->nullable();
            $table->string('serial');
            $table->boolean('passcode')->default(true)->nullable();
            $table->enum('boxed',['true','false']);
            $table->enum('condition',['Like New','Good','Fair','Poor','Faulty/Damaged']);
            $table->string('notes')->nullable();
            $table->float('selling_price', 8, 2)->nullable();
            $table->integer('user_id');
            $table->enum('aquisition_type', ['buy-in','buy-back','buy-back seized','other']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
