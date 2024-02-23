<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserForm extends Component
{
    public ?User $user;

    // #[Locked]
    public $id;

    #[Validate('required', as: 'nome')]
    public $name;

    #[Validate('required|email', as: 'e-mail')]
    public $email;

    #[Validate('nullable', as: 'senha')]
    public $password;

    #[Validate('nullable', as: 'último acesso')]
    public $ultimo_acesso_at;

    #[Validate('nullable', as: 'escola')]
    public $escola_id;

    #[Validate('nullable', as: 'cargo')]
    public $cargo_id;

    #[Validate('nullable', as: 'matrícula')]
    public $matricula;

    #[Validate('nullable', as: 'cpf')]
    public $cpf;

    #[Validate('nullable', as: 'Data nascimento')]
    public $data_nascimento;

    public function setUser(User $user) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->ultimo_acesso_at = $user->ultimo_acesso_at;
        $this->escola_id = $user->escola_id;
        $this->cargo_id = $user->cargo_id;
        $this->matricula = $user->matricula;
        $this->cpf = $user->cpf;
        $this->data_nascimento = $user->data_nascimento;
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
