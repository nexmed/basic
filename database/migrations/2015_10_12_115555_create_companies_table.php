<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_inn', 16)->unique();
            $table->string('company_address')->nullable();
            $table->string('company_site', 250)->nullable();
            $table->string('company_license', 100);
            $table->string('company_logo_path', 250)->nullable();
            $table->string('company_stamp_path', 250)->nullable();
            $table->engine = 'InnoDB';
        });

        Schema::create('person', function (Blueprint $table) {
            $table->increments('person_id');
            $table->string('person_name', 250);
            $table->date('person_birth_date');
            $table->enum('person_sex', array('male', 'female'));
            $table->integer('person_company_id')->unsigned();
            $table->foreign('person_company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->string('person_position', 200)->nullable();
            $table->string('person_signature_path', 250)->nullable();
            $table->text('person_passport')->nullable();
            $table->engine = 'InnoDB';
        });
        Schema::table('users', function(Blueprint $table){
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_company_id_foreign');
        });
        Schema::table('person', function(Blueprint $table){
            $table->dropForeign('person_person_company_id_foreign');
        });
        Schema::dropIfExists('companies');
        Schema::dropIfExists('person');
    }
}
