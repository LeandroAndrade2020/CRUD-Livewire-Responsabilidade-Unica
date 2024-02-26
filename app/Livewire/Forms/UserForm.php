<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

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

    public function setUser(User $user) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->user = $user;

        $this->name    = $user->name;
        $this->email   = $user->email;
        $this->address = $user->address;

        $this->apoios = $user->apoios;
    }

    public function store()
    {
        User::create($this->except(['user']));

        $this->reset();
    }

    public function update()
    {
        $this->user->update($this->except(['user']));
    }
}
