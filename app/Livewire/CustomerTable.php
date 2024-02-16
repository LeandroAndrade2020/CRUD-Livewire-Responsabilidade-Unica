<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;

class CustomerTable extends Component
{
    #[On('dispatch-customer-create-save')]
    public function render()
    {
        return view('livewire.customer-table', [

            'data' => Customer::get(),
        ]);
    }
}
