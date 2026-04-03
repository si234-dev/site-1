<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::dropIfExists('users');
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('username', 20)->unique();
        $table->string('password', 20);
        $table->integer('jobid');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('users');
}

}; 