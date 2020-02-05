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
            $table->text('file');
            $table->string('gc_level');
            $table->string('temperature');
            $table->string('body_weight');
            $table->string('spo2');
            $table->string('pr');
            $table->string('bp');
            $table->string('rbs');
            $table->text('complaint');
            $table->text('examination');
            $table->text('relevant_info');
            $table->string('chronic_disease');
            $table->string('diagnosis');
            $table->text('external_medicine');
            $table->date('next_visit_date');
            $table->date('next_visit_date2');
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
