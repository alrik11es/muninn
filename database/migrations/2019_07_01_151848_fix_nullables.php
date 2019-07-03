<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixNullables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('agents', 'scenario_id')) {
            Schema::table('agents', function (Blueprint $table) {
                $table->dropColumn('scenario_id');
            });
        }

        Schema::table('agents', function (Blueprint $table) {
            $table->integer('scenario_id')->unsigned()->nullable();
            $table->string('schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('agents', 'scenario_id')) {
            Schema::table('agents', function (Blueprint $table) {
                $table->dropColumn('scenario_id');
            });
        }

        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn('schedule');
        });


        Schema::table('agents', function (Blueprint $table) {
            $table->integer('scenario_id')->unsigned();
        });
    }
}
