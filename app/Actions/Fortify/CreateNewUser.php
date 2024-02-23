<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\{Hash, Validator};
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => $this->passwordRules(),
            'terms'            => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'ultimo_acesso_at' => ['nullable'],
            'escola_id'        => ['nullable', 'integer'],
            'cargo_id'         => ['nullable', 'integer'],
            'matricula'        => ['nullable', 'string', 'max:6'],
            'cpf'              => ['nullable', 'string', 'max:11'],
            'data_nascimento'  => ['nullable', 'date'],

        ])->validate();

        $user = User::create([
            'name'             => $input['name'],
            'email'            => $input['email'],
            'password'         => Hash::make($input['password']),
            'ultimo_acesso_at' => $input['ultimo_acesso_at'],
            'escola_id'        => $input['escola_id'],
            'cargo_id'         => $input['cargo_id'],
            'matricula'        => $input['matricula'],
            'cpf'              => $input['cpf'],
            'data_nascimento'  => $input['data_nascimento'],

        ]);

        $user->roles()->attach(2);

        return $user;
    }
}
