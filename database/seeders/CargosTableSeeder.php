<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('cargos')->delete();

        \DB::table('cargos')->insert([
            0 => [
                'id' => 1,
                'name' => 'Professor PEB I',
            ],
            1 => [
                'id' => 2,
                'name' => 'Professor PEB II',
            ],
            2 => [
                'id' => 3,
                'name' => 'Coordenador',
            ],
            3 => [
                'id' => 4,
                'name' => 'Vice-Diretor',
            ],
            4 => [
                'id' => 5,
                'name' => 'Diretor',
            ],
            5 => [
                'id' => 6,
                'name' => 'Apoio',
            ],
            6 => [
                'id' => 7,
                'name' => 'Supervisor',
            ],
            7 => [
                'id' => 8,
                'name' => 'ADI',
            ],
            8 => [
                'id' => 9,
                'name' => 'Inspetor',
            ],
            9 => [
                'id' => 10,
                'name' => 'AEE',
            ],
            10 => [
                'id' => 11,
                'name' => 'Professor Adjunto',
            ],
            11 => [
                'id' => 12,
                'name' => 'Agente Administrativo',
            ],
            12 => [
                'id' => 13,
                'name' => 'Professor Adjunto I',
            ],
            13 => [
                'id' => 14,
                'name' => 'Professor Adjunto II',
            ],
            14 => [
                'id' => 15,
                'name' => 'Outro',
            ],
            15 => [
                'id' => 16,
                'name' => 'Educação Infantil',
            ],
            16 => [
                'id' => 17,
                'name' => 'Secretario(a)',
            ],
            17 => [
                'id' => 18,
                'name' => 'Precisa alterar',
            ],
            18 => [
                'id' => 19,
                'name' => 'Super Admin',
            ],
        ]);

    }
}
