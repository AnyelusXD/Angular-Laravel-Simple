<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplications', function (Blueprint $table) {
            $table->id();
            $table->string('user', 100);            
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('typeId', 100);
            $table->string('numId', 100);
            $table->date('birthdate');
            $table->string('password', 100);
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
        Schema::dropIfExists('aplications');
    }
}
