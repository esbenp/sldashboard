<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('title');
            $table->string('slug');
            $table->string('icon');
            $table->text('format')->nullable();
            $table->string('partial');
            $table->timestamps();
        });

        Schema::table('boxes', function($table)
        {
            $table->string('type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('types');
    }
}
