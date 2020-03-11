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
            $table->string('gc_level')->nullable();
            $table->string('temperature')->nullable();
            $table->string('body_weight')->nullable();
            $table->string('spo2')->nullable();
            $table->string('pr')->nullable();
            $table->string('bp')->nullable();
            $table->string('rbs')->nullable();
            $table->text('complaint')->nullable();
            $table->text('examination')->nullable();
            $table->text('relevant_info')->nullable();
            $table->string('chronic_disease')->nullable();;
            $table->string('diagnosis')->nullable();
            $table->text('external_medicine')->nullable();
            $table->date('next_visit_date')->nullable();
            $table->date('next_visit_date2')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');

            $table->string('charges');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('cascade');
            $table->foreign('doctor_id')
                  ->references('id')->on('doctors')
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
        Schema::dropIfExists('treatments');
    }
}
