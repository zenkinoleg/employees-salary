<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->decimal('salary', 8, 2);
            $table->dateTime('birthday');
            $table->integer('kids')->unsigned()->default(0);
            $table->tinyInteger('rent_car')->unsigned()->default(0);
            // We won't let CRUD such records
            $table->tinyInteger('permanent')->unsigned()->default(0);
            // Won't be used in this version
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
