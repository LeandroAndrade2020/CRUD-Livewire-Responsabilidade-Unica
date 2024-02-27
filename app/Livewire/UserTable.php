<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\{Component, WithPagination};

class UserTable extends Component
{
    use WithPagination;
    use WithSorting;

    public UserForm $form;

    public $paginate = 5;

    public $sortBy = 'users.updated_at';

    public $sortDirection = 'desc';

    #[On('dispatch-user-create-save')]
    #[On('dispatch-user-create-edit')]
    #[On('dispatch-user-delete-del')]
    public function render()
    {
        return view('livewire.user-table',
            [

                'data' => User::where('id', 'like', '%' . $this->form->id . '%')
                    ->where('name', 'like', '%' . $this->form->name . '%')
                    ->where('email', 'like', '%' . $this->form->email . '%')
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->paginate),
            ]
        );
    }

    public function resetPassword()
    {
        $user = Auth::user();

        $user->password = Hash::make('nova_senha');

        $user->save();

        session()->flash('message', 'Senha redefinida com sucesso!');
    }

    public function resetarSenha(User $user)
    {

        $password = 'Atividade1!';

        $user->forceFill([
            'password' => Hash::make($password),
        ]);
        $user->save();
        // LogService::sendResetPasswordLog($user->id, $user->name);
    }
}
