<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_statuses', function(Blueprint $table){
            $table->increments('id');
            $table->string('status_name', 100);
            $table->string('status_description', 255)->nullable();
            $table->engine = 'InnoDB';
        });
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid_customer_id')->unsigned();
            $table->foreign('bid_customer_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->integer('bid_executor_id')->unsigned();
            $table->foreign('bid_executor_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->integer('bid_contract_id')->unsigned();
            $table->foreign('bid_contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->integer('bid_status_id')->unsigned();
            $table->foreign('bid_status_id')->references('id')->on('bid_statuses')->onDelete('cascade');
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
        Schema::table('bids', function(Blueprint $table){
            $table->dropForeign('bids_bid_customer_id_foreign');
            $table->dropForeign('bids_bid_executor_id_foreign');
            $table->dropForeign('bids_bid_contract_id_foreign');
            $table->dropForeign('bids_bid_status_id_foreign');
        });
        Schema::dropIfExists('bid_statuses');
        Schema::dropIfExists('bids');
    }
}
