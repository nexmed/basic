<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use database\seeds\InsertUserRolesTable;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(InsertUserRolesTable::class);

        Model::reguard();
    }
}
