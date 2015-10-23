<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertUserRolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['user_role_name' => 'Админ'],
            ['user_role_name' => 'Заказчик'],
            ['user_role_name' => 'Исполнитель'],
            ['user_role_name' => 'Лаборатория'],
            ['user_role_name' => 'Заказчик + Исполнитель'],
            ['user_role_name' => 'Заказчик + Лаборатория'],
            ['user_role_name' => 'Исполнитель + Лаборатория'],
            ['user_role_name' => 'Заказчик + Исполнитель+ Лаборатория'],
            ['user_role_name' => 'Неактивная учетная запись'],
        ]);
        DB::table('users')->insert([
            'name' => 'XanderB', 'email' => 'main@xanderb.ru', 'password' => bcrypt('05051989'), 'user_role_id' => 1, 'company_id' => NULL
        ]);
    }
}
