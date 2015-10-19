<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidAssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table){
            $table->increments('id');
            $table->string('patient_name');
            $table->date('patient_dob')->nullable();
            $table->enum('patient_sex', array('male', 'female'))->default('male');
            $table->string('patient_email')->nullable();
            $table->string('patient_phone', 30)->nullable();
            $table->string('patient_contingent_code')->nullable();
            $table->engine = 'InnoDB';
        });

        Schema::create('assay_complete_statuses', function(Blueprint $table){
            $table->increments('id');
            $table->string('status_name');
            $table->string('status_description')->nullable();
            $table->engine = 'InnoDB';
        });

        Schema::create('bid_assays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bid_id')->unsigned();
            $table->foreign('bid_id')->references('id')->on('bids')->onDelete('cascade');
            $table->integer('bid_assay_patient_id')->unsigned();
            $table->foreign('bid_assay_patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('bid_assay_department')->nullable();
            $table->integer('bid_assay_doctor_id')->unsigned()->nullable();
            $table->foreign('bid_assay_doctor_id')->references('person_id')->on('person')->onDelete('set null');
            $table->integer('bid_assay_tester_id')->unsigned()->nullable();
            $table->foreign('bid_assay_tester_id')->references('person_id')->on('person')->onDelete('set null');
            $table->integer('assay_id')->unsigned();
            $table->foreign('assay_id')->references('assay_id')->on('assays_list')->onDelete('cascade');
            $table->integer('complete_status_id')->unsigned();
            $table->foreign('complete_status_id')->references('id')->on('assay_complete_statuses')->onDelete('cascade');
            $table->integer('lab_id')->unsigned()->nullable();
            $table->foreign('lab_id')->references('company_id')->on('companies')->onDelete('set null');
            $table->string('assay_result')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bid_assays', function(Blueprint $table){
            $table->dropForeign('bid_assays_bid_id_foreign');
            $table->dropForeign('bid_assays_bid_assay_patient_id_foreign');
            $table->dropForeign('bid_assays_bid_assay_doctor_id_foreign');
            $table->dropForeign('bid_assays_bid_assay_tester_id_foreign');
            $table->dropForeign('bid_assays_assay_id_foreign');
            $table->dropForeign('bid_assays_complete_status_id_foreign');
            $table->dropForeign('bid_assays_lab_id_foreign');
        });
        Schema::dropIfExists('patients');
        Schema::dropIfExists('assay_complete_statuses');
        Schema::dropIfExists('bid_assays');
    }
}
