<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Customer\Table;
use Livewire\Attributes\{Locked, On};
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-customer-table-delete')]
    public function set_customer($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Customer::destroy($this->id);

        ($del)
        ? $this->toast()->success('Cadastro excluído com sucesso!')->send()
        : $this->toast()->error('Cadastro não excluído!')->send();

        $this->modalDelete = false;

        $this->dispatch('dispatch-customer-delete-del')->to(Table::class);
    }

    public function render()
    {
        return view('livewire.customer.delete');
    }
}
