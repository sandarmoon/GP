<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reception_id');
            $table->string('name');
            $table->string('fatherName');
            $table->integer('age');
            $table->boolean('child');
            $table->string('gender');
            $table->string('phoneno');
            $table->text('address');
            $table->boolean('married_status');
            $table->boolean('pregnant');
            $table->string('body_weight');
            $table->string('allergy');
            $table->string('job');
            $table->text('file');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('reception_id')
                ->references('id')->on('receptions')
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
        Schema::dropIfExists('patients');
    }
}
