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
    public $name = '';

    #[Validate('required|email', as: 'e-mail')]
    public $email = '';

    #[Validate('required|integer', as: 'escola')]
    public $escola_id = '';

    #[Validate('required', as: 'cargo')]
    public $cargo_id = '';

    #[Validate('required', as: 'matrícula')]
    public $matricula = '';

    #[Validate('nullable', as: 'cpf')]
    public $cpf = '';

    #[Validate('required|date', as: 'data de nascimento')]
    public $data_nascimento = '';

    public $selectedRoles = [];

    public function setUser(User $user) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->user = $user;

        $this->name            = $user->name;
        $this->email           = $user->email;
        $this->escola_id       = $user->escola_id;
        $this->cargo_id        = $user->cargo_id;
        $this->matricula       = $user->matricula;
        $this->cpf             = $user->cpf;
        $this->data_nascimento = $user->data_nascimento;

        $this->selectedRoles = $user->roles->pluck('id')->toArray();
    }

    public function store()
    {
        $user = User::create($this->except(['user']));

        $user->roles()->attach(3);

        $this->reset();
    }

    public function update()
    {
        $this->user->update($this->except(['user']));

        $this->user->roles()->sync(1);
        // $this->user->roles()->sync($this->selectedRoles);

        $this->reset();
    }
}
