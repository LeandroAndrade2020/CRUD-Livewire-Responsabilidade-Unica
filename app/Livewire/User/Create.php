<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Create extends Component
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

        $this->dispatch('dispatch-User-create-save')->to(Table::class);

        $this->modalCreate = false;
    }
    public function render()
    {
        return view('livewire.user.create');
    }
}
