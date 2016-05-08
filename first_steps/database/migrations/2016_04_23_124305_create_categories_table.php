<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps(); //created_at , updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
