<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserPasswordReset extends Controller
{
    public function resetarSenha(User $user)
    {
        $password = 'Atividade1!';

        $user->forceFill([
            'password' => Hash::make($password),
        ]);
        $user->save();
        // LogService::sendResetPasswordLog($user->id, $user->name);

        return redirect()->route('user.index')->with('password-reset', 'Senha redefinida com sucesso!');
    }
}
