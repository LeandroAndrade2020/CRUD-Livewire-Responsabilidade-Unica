<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserPassword extends Component
{
    public function resetarSenha(User $user)
    {
        abort_if(Gate::denies('gerente_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');

        $password = 'Atividade1!';

        $user->forceFill([
            'password' => Hash::make($password),
        ]);
        $user->save();
        // LogService::sendResetPasswordLog($user->id, $user->name);
    }
}
