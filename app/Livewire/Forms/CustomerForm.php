<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer;

    // #[Locked]
    public $id;

    #[Validate('required', as: 'nome')]
    public $name;

    #[Validate('required|email', as: 'e-mail')]
    public $email;

    #[Validate('required|min:3', as: 'endereço')]
    public $address;

    #[Validate('required', as: 'apoios')]
    public $apoios = [];

    public function setCustomer(Customer $customer) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->customer = $customer;

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->address = $customer->address;

        $this->apoios = $customer->apoios;
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
