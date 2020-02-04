<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine__treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('treatment_id');
            $table->unsignedBigInteger('medicine_id');
            $table->string('tab');
            $table->string('interval');
            $table->string('meal');
            $table->string('during');
            $table->string('type');
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
        Schema::dropIfExists('medicine__treatments');
    }
}
