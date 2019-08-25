<?php

use Illuminate\Database\Seeder;

class racesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $races = [
            '1' => 'Enano',
            '2' => 'Elfo',
            '3' => 'Mediano',
            '4' => 'Humano',
            '5' => 'Draconido',
            '6' => 'Gnomo',
            '7' => 'Semielfo',
            '8' => 'Semiorco',
            '9' => 'Tiflin'
        ];

        foreach ($races as $key => $race) {
            DB::table('races')->insert([
                'name' => $race,
            ]);
        }

    }
}
