<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\{Component, WithPagination};

class Table extends Component
{
    use WithPagination;
    use WithSorting;

    public CustomerForm $form;

    public $paginate = 5;

    public $sortBy = 'customers.updated_at';

    public $sortDirection = 'desc';

    #[On('dispatch-customer-create-save')]
    #[On('dispatch-customer-create-edit')]
    #[On('dispatch-customer-delete-del')]
    public function render()
    {
        return view('livewire.customer.table', [

            'data' => Customer::where('id', 'like', '%' . $this->form->id . '%')
                ->where('name', 'like', '%' . $this->form->name . '%')
                ->where('email', 'like', '%' . $this->form->email . '%')
                ->where('address', 'like', '%' . $this->form->address . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }
}
