<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CustomerCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->toast()->success('Cadastro realizado com sucesso!')->send()
        : $this->toast()->error('Cadastro não atualizado!')->send();

        $this->dispatch('dispatch-customer-create-save')->to(CustomerTable::class);

        $this->modalCustomerCreate = false;
    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
