<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Customer;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CustomerForm extends Form
{
    public ?Customer $customer;

    // #[Locked]
    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public ?string $name;

    #[Rule('required|email', as: 'Email')]
    public ?string $email;

    #[Rule('required|min:3', as: 'Address')]
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
