<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CustomerForm extends Form
{
    public ?Customer $customer;

    #[Rule('required|string|min:3|max:255', as: 'Nome')]
    public ?string $name;

    #[Rule('required|email', as: 'Email')]
    public ?string $email;

    #[Rule('required|string|min:3|max:255', as: 'Endereço')]
    public ?string $address;

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
