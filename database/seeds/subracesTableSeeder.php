<?php

use Illuminate\Database\Seeder;

class subracesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enanos = [
            '1' => 'Enano de las colinas',
            '2' => 'Enano de las montañas',
        ];
        $elfos = [
            '1' => 'Alto elfo',
            '2' => 'Drow',
        ];
        $medianos = [
            '1' => 'Piesligeros',
            '2' => 'Fornidos',
        ];
        $humanos = [
            '1' => 'Calishita',
            '2' => 'Chondathan',
            '3' => 'Illuskan',
            '4' => 'Mulan',
            '5' => 'Rashemi',
            '6' => 'Shou',
            '7' => 'Tethyrianos',
            '8' => 'Turami',
        ];
        $draconidos = [
            '1' => 'Azul',
            '2' => 'Blanco',
            '3' => 'Bronce',
            '4' => 'Cobre',
            '5' => 'Latón',
            '6' => 'Negro',
            '7' => 'Oro',
            '8' => 'Plata',
            '9' => 'Rojo',
            '10' => 'Verde',
        ];
        $gnomos = [
            '1' => 'Gnomos de los bosques',
            '2' => 'Gnomos de las rocas ',
        ];
        foreach ($enanos as $key => $enano) {
            DB::table('subraces')->insert([
                'name' => $enano
            ]);
        }
        foreach ($elfos as $key => $elfo) {
            DB::table('subraces')->insert([
                'name' => $elfo
            ]);
        }
        foreach ($medianos as $key => $mediano) {
            DB::table('subraces')->insert([
                'name' => $mediano
            ]);
        }
        foreach ($humanos as $key => $humano) {
            DB::table('subraces')->insert([
                'name' => $humano
            ]);
        }
        foreach ($draconidos as $key => $draconido) {
            DB::table('subraces')->insert([
                'name' => $draconido
            ]);
        }
        foreach ($gnomos as $key => $gnomo) {
            DB::table('subraces')->insert([
                'name' => $gnomo
            ]);
        }
    }
}
