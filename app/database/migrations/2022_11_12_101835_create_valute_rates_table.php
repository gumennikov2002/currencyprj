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
        Schema::create('valute_rates', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('num_code');
            $table->string('char_code');
            $table->integer('nominal');
            $table->string('name');
            $table->double('value');
            $table->double('previous_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valute_rates');
    }
};
