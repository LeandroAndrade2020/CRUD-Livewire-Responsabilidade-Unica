<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\UserForm;
use TallStackUi\Traits\Interactions;

class UserCreate extends Component
{
    use Interactions;

    public UserForm $form;

    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->toast()->success('Cadastro realizado com sucesso!')->send()
        : $this->toast()->error('Cadastro não atualizado!')->send();

        $this->dispatch('dispatch-User-create-save')->to(UserTable::class);

        $this->modalCreate = false;
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
