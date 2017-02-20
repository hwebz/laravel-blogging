<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Tech';
        $category->save();

        $category = new Category();
        $category->name = 'Sports';
        $category->save();

        $category = new Category();
        $category->name = 'Food';
        $category->save();
    }
}

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email = "test@test.com";
        $admin->password = bcrypt('123456');
        $admin->save();
    }
}
