<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;

class UserEdit extends Component
{
    public UserForm $form;

    public $user;

    public $modalEdit = false;

    #[On('dispatch-user-table-edit')]
    public function set_user(User $id)
    {
        $this->form->setUser($id);

        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $dados = $this->form->update();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro atualizado com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não atualizado!');

        $this->dispatch('dispatch-user-create-edit')->to(UserTable::class);

        $this->modalEdit = false;
    }
    public function render()
    {
        $roles = Role::all();

        $user = User::find($this->user);

        return view('livewire.user-edit', [
            'roles' => $roles,
            'user'  => $user,
        ]);
    }
}
