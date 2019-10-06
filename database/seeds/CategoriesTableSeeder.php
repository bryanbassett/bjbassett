<?php
use App\Cats;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cats::class, 1)->create();
        factory(Cats::class, 1)->create([
            'id' => '2',
        ]);
        factory(Cats::class, 1)->create([
            'id' => '3',
            'parent_id' => '2',
        ]);
        factory(Cats::class, 3)->create([
            'parent_id' => '3',
        ]);
        factory(Cats::class, 5)->create();
        factory(Cats::class, 1)->create([
            'section' => '1',
        ]);
        factory(Cats::class, 5)->create([
            'section' => '2',
        ]);
        factory(Cats::class, 5)->create([
            'section' => '3',
        ]);
        factory(Cats::class, 4)->create([
            'parent_id' => '20',
        ]);
        factory(Cats::class, 2)->create([
            'parent_id' => '6',
        ]);
        factory(Cats::class, 4)->create([
            'parent_id' => '7',
        ]);
        factory(Cats::class, 1)->create([
            'parent_id' => '4',
        ]);
        factory(Cats::class, 3)->create([
            'parent_id' => '5',
        ]);
    }
}
