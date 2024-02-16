<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Customer;
use Livewire\Attributes\Validate;

class CustomerForm extends Form
{
    public ?Customer $customer;

    // #[Locked]
    public $id;

    #[Validate('required|min:3', as: 'nome')]
    public $name;

    #[Validate('required|email', as: 'e-mail')]
    public $email;

    #[Validate('required|min:3', as: 'endereço')]
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
        Customer::create($this->except(['customer']));

        $this->reset();
    }

    public function update()
    {
        $this->customer->update($this->except(['customer']));
    }

}
