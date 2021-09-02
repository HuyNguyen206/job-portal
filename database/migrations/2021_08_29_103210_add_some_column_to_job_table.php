<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->integer('number_of_vacancy')->nullable();
            $table->tinyInteger('year_of_experience')->nullable();
            $table->string('gender')->nullable();
            $table->string('salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->dropColumn(['number_of_vacancy', 'experience', 'gender', 'salary']);
        });
    }
}
