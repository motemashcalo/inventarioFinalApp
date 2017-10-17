<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCelularExtToCustodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custodios', function (Blueprint $table) {
            $table->string('celular');
            $table->string('ext');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custodios', function (Blueprint $table) {
            $table->dropColumn('celular');
            $table->dropColumn('ext');
        });
    }
}
