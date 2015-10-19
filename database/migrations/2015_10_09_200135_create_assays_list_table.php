<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssaysListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assays_list', function (Blueprint $table) {
            $table->increments('assay_id');
            $table->string('assay_name', 250);
            $table->string('assay_group', 250);
            $table->integer('assay_deadline_common');
            $table->integer('assay_deadline_lab');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('indicators', function (Blueprint $table) {
            $table->increments('indicator_id');
            $table->string('indicator_unit', 150)->nullable();
            $table->integer('assay_id')->unsigned();
            $table->foreign('assay_id')->references('assay_id')->on('assays_list')->onDelete('cascade');
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
        Schema::table('indicators', function(Blueprint $table){
            $table->dropForeign('indicators_assay_id_foreign');
        });

        Schema::dropIfExists('assays_list');
        Schema::dropIfExists('indicators');

    }
}
