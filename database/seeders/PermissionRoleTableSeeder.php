<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('permission_role')->delete();

        \DB::table('permission_role')->insert([
            0 => [
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'role_id' => 2,
                'permission_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'role_id' => 3,
                'permission_id' => 3,
                'created_at' => '2023-11-14 18:52:47',
                'updated_at' => null,
            ],
            4 => [
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-11-14 18:52:47',
                'updated_at' => null,
            ],
        ]);

    }
}
