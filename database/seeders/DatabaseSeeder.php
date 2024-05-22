<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = new User();
        $user->name = 'root';
        $user->username = 'root';
        $user->email = 'esprimo@admin.it';
        $user->password = bcrypt('password');
        $user->save();

        // \App\Models\User::factory(10)->create();
    }
}
