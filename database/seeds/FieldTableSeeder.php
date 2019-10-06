<?php
use App\Field;
use Illuminate\Database\Seeder;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Field::class, 2)->create([
            'type' => 'text',
        ]);
        factory(Field::class, 2)->create([
            'type' => 'textarea',
        ]);
        factory(Field::class, 2)->create([
            'type' => 'date',
        ]);
        factory(Field::class, 2)->create([
            'type' => 'link',
        ]);
    }
}
