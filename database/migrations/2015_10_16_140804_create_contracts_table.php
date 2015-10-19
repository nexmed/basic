<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_customer_id')->unsigned();
            $table->foreign('contract_customer_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->integer('contract_executor_id')->unsigned();
            $table->foreign('contract_executor_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->string('contract_number', 50);
            $table->date('contract_date');
            $table->string('contract_cypher', 100)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
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
        Schema::table('contracts', function(Blueprint $table){
            $table->dropForeign('contracts_contract_customer_id_foreign');
            $table->dropForeign('contracts_contract_executor_id_foreign');
            $table->dropForeign('contracts_created_by_foreign');
        });
        Schema::dropIfExists('contracts');
    }
}
