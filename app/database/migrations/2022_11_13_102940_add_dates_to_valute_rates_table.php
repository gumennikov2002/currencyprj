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
        Schema::table('valute_rates', function (Blueprint $table) {
            $table->datetime('date');
            $table->datetime('previous_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('valute_rates', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('previous_date');
        });
    }
};
