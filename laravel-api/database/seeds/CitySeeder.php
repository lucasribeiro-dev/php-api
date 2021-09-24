<?php


use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(\App\Models\Citys::class, 100)->create();

        } catch (\Throwable $th) {
            
        }

    }
}
