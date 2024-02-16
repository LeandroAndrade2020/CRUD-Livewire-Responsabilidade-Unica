<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Livewire\Forms\CustomerForm;

class CustomerEdit extends Component
{
    public CustomerForm $form;

    public $modalCustomerEdit = false;

    #[On('dispatch-customer-table-edit')]
    public function set_customer(Customer $id)
    {
        $this->form->setCustomer($id);

        $this->modalCustomerEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $dados = $this->form->update();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro atualizado com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não atualizado!');

        $this->dispatch('dispatch-customer-create-edit')->to(CustomerTable::class);
    }
    public function render()
    {
        return view('livewire.customer-edit');
    }
}
