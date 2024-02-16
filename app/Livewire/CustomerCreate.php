<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\CustomerTable;
use App\Livewire\Forms\CustomerForm;

class CustomerCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro realizado com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não efetivado!');

        $this->dispatch('dispatch-customer-create-save')->to(CustomerTable::class);

        $this->modalCustomerCreate = false;
    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
