<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(UserProductTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
    }
}
