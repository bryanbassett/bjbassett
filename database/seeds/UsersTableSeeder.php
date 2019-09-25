<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'test',
            'email' => 'bbassett@kent.edu',
            'password' => bcrypt('test')
        ]);

        factory(User::class, 5)->create();
    }
}
