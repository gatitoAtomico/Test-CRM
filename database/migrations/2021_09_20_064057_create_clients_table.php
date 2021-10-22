<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('gender');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.6
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
