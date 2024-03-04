<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use Customer\Table;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public CustomerForm $form;

    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->toast()->success('Cadastro realizado com sucesso!')->send()
        : $this->toast()->error('Cadastro não atualizado!')->send();

        $this->dispatch('dispatch-customer-create-save')->to(Table::class);

        $this->modalCreate = false;
    }

    public function render()
    {
        return view('livewire.customer.create');
    }
}
