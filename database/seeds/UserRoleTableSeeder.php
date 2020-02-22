<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;


class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->truncate();

        UserRole::create([
            'user_id' => '1',
            'role_id' => '1'
        ]);
    }
}
