<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractAssayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_assay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assay_id')->unsigned();
            $table->foreign('assay_id')->references('assay_id')->on('assays_list')->onDelete('cascade');
            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->integer('assay_value')->unsigned()->default(0);
            $table->decimal('contract_cost', 15, 2)->default(0);
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
        Schema::table('contract_assay', function(Blueprint $table){
            $table->dropForeign('contract_assay_assay_id_foreign');
            $table->dropForeign('contract_assay_contract_id_foreign');
        });
        Schema::dropIfExists('contract_assay');
    }
}
