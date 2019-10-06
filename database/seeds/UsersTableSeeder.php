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
        factory(User::class, 5)->create();
        factory(User::class)->create([
            'username' => 'test',
            'email' => 'bbassett@kent.edu',
        ]);
    }
}
