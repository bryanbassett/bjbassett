<?php

use App\ShortLink;
use Illuminate\Database\Seeder;

class ShortLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShortLink::class, 10)->create();
    }
}
