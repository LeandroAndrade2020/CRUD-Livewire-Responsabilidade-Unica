<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Customer\Table;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public CustomerForm $form;

    public $modalEdit = false;

    #[On('dispatch-customer-table-edit')]
    public function set_customer(Customer $id)
    {
        $this->form->setCustomer($id);

        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $dados = $this->form->update();

        is_null($dados)
        ? $this->toast()->success('Cadastro atualizado com sucesso!')->send()
        : $this->toast()->error('Cadastro não atualizado!')->send();

        $this->dispatch('dispatch-customer-create-edit')->to(Table::class);

        $this->modalEdit = false;
    }

    public function render()
    {
        return view('livewire.customer.edit');
    }
}
