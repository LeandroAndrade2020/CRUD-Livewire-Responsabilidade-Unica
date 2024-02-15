<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CustomerCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();

        $dados = $this->form->store();

        is_null($dados)
        ? $this->dispatch('notify', title: 'success', message: 'Notificação enviada com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Notificação não enviada!');

    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
