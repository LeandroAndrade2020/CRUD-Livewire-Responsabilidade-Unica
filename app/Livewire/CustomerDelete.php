<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Attributes\{Locked, On};
use Livewire\Component;

class CustomerDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalCustomerDelete = false;

    #[On('dispatch-customer-table-delete')]
    public function set_customer($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalCustomerDelete = true;
    }

    public function del()
    {
        $del = Customer::destroy($this->id);

        ($del)
        ? $this->toast()->success('Cadastro excluído com sucesso!')->send()
        : $this->toast()->error('Cadastro não excluído!')->send();

        $this->modalCustomerDelete = false;

        $this->dispatch('dispatch-customer-delete-del')->to(CustomerTable::class);
    }

    public function render()
    {
        return view('livewire.customer-delete');
    }
}
