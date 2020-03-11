<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_treatment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('treatment_id');
            $table->unsignedBigInteger('medicine_id');
            $table->string('tab')->nullable();
            $table->string('interval')->nullable();
            $table->string('meal')->nullable();
            $table->string('during')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('treatment_id')
                  ->references('id')->on('treatments')
                  ->onDelete('cascade');

            $table->foreign('medicine_id')
                  ->references('id')->on('medicines')
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
        Schema::dropIfExists('medicine__treatments');
    }
}
