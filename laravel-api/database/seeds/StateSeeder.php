<?php


use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(\App\Models\States::class, 30)->create();

        } catch (\Throwable $th) {
            
        }

    }
}
