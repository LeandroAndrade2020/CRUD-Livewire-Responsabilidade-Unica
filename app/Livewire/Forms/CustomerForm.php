<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Customer;
use Livewire\Attributes\Rule;

class CustomerForm extends Form
{
    public ?Customer $customer;

    // #[Locked]
    public $id;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email', as: 'E-mail')]
    public $email;

    #[Rule('required|min:3', as: 'Endereço')]
    public $address;

    public function setCustomer(Customer $customer) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->customer = $customer;

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->address = $customer->address;
    }

    public function store()
    {
        Customer::create($this->except('customer'));

        $this->reset();
    }

    public function update()
    {
        $this->customer->update($this->except(['customer']));
    }

}
