<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function(Blueprint $table) {
            $table->increments('role_id');
            $table->string('user_role_name', 100);
            $table->string('user_role_description', 250);
            $table->engine = 'InnoDB';
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('user_role_id')->unsigned();
            $table->foreign('user_role_id')->references('role_id')->on('user_roles')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_user_role_id_foreign');
        });
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('users');
    }
}
