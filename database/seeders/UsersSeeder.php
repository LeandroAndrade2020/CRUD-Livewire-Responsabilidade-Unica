<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id' => 1,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12345,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'Gestor Seduc',
                'email' => 'gestor@gestor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12346,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 4,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'name' => 'Admin Seduc',
                'email' => 'admin@atribuicao.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12347,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'id' => 4,
                'name' => 'D 1',
                'email' => 'diretor1@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12354,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            4 => [
                'id' => 5,
                'name' => 'D 2',
                'email' => 'diretor2@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12353,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 2,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            5 => [
                'id' => 6,
                'name' => 'D 3',
                'email' => 'diretor3@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12352,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 3,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            6 => [
                'id' => 7,
                'name' => 'D 4',
                'email' => 'diretor4@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12351,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 4,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            7 => [
                'id' => 8,
                'name' => 'D 5',
                'email' => 'diretor5@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12350,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 5,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            8 => [
                'id' => 9,
                'name' => 'D 6',
                'email' => 'diretor6@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12349,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 36,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            9 => [
                'id' => 10,
                'name' => 'D 7',
                'email' => 'diretor7@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12348,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 7,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            10 => [
                'id' => 11,
                'name' => 'D 8',
                'email' => 'diretor8@diretor.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'matricula' => 12338,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 34,
                'cargo_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
