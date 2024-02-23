<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo'            => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'ultimo_acesso_at' => ['nullable'],
            'escola_id'        => ['nullable', 'integer'],
            'cargo_id'         => ['nullable', 'integer'],
            'matricula'        => ['nullable', 'string', 'max:6'],
            'cpf'              => ['nullable', 'string', 'max:11'],
            'data_nascimento'  => ['nullable', 'date'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name'             => $input['name'],
                'email'            => $input['email'],
                'ultimo_acesso_at' => $input['ultimo_acesso_at'],
                'escola_id'        => $input['escola_id'],
                'cargo_id'         => $input['cargo_id'],
                'matricula'        => $input['matricula'],
                'cpf'              => $input['cpf'],
                'data_nascimento'  => $input['data_nascimento'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name'              => $input['name'],
            'email'             => $input['email'],
            'email_verified_at' => null,
            'ultimo_acesso_at'  => $input['ultimo_acesso_at'],
            'escola_id'         => $input['escola_id'],
            'cargo_id'          => $input['cargo_id'],
            'matricula'         => $input['matricula'],
            'cpf'               => $input['cpf'],
            'data_nascimento'   => $input['data_nascimento'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
