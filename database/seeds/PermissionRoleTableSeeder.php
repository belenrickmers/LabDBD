<?php

use Illuminate\Database\Seeder;
use App\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PermissionRole::class, 10)->create();
    }
}
