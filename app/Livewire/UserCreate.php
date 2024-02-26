<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\UserForm;

class UserCreate extends Component
{
    public UserForm $form;

    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro realizado com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não efetivado!');

        $this->dispatch('dispatch-User-create-save')->to(UserTable::class);

        $this->modalCreate = false;
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
