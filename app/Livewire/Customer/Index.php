<?php

namespace App\Livewire\Customer;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Customer')]
    public function render(): View
    {
        return view('livewire.customer.index');
    }
}
