<?php

use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $roles =[
          ['name' => 'super_admin', 'description' => 'Can Edit Everything'],
          ['name' => 'admin', 'description' => 'Can Edit'],
          ['name' => 'guest', 'description' => 'Consume Our Product']
        ];
        Role::insert($roles);
    }
}
