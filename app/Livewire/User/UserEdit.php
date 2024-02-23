<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;
use App\Livewire\User\UserTable;

class UserEdit extends Component
{
    public UserForm $form;

    public $modalUserEdit = false;

    #[On('dispatch-user-table-edit')]
    public function set_user(User $id)
    {
        $this->form->setUser($id);

        $this->modalUserEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $dados = $this->form->update();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro atualizado com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não atualizado!');

        $this->dispatch('dispatch-customer-create-edit')->to(UserTable::class);

        $this->modalUserEdit = false;
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }
}
