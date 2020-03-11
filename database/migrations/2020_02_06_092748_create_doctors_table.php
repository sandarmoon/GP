<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nrc')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->string('degree')->nullable();
            $table->string('certificate')->nullable();
            $table->string('license')->nullable();
            $table->string('experience')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
