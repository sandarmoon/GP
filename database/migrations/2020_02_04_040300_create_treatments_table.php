<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('file')->nullable();
            $table->string('gc_level');
            $table->string('temperature')->nullable();
            $table->string('body_weight')->nullable();
            $table->string('spo2')->nullable();
            $table->string('pr')->nullable();
            $table->string('bp')->nullable();
            $table->string('rbs')->nullable();
            $table->text('complaint');
            $table->text('examination')->nullable();
            $table->text('relevant_info')->nullable();
            $table->string('chronic_disease');
            $table->string('diagnosis');
            $table->text('external_medicine')->nullable();
            $table->date('next_visit_date')->nullable();
            $table->date('next_visit_date2')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->string('charges');
            $table->softDeletes();
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
        Schema::dropIfExists('treatments');
    }
}
