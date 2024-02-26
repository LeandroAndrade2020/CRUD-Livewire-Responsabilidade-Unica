<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Title;

class UserIndex extends Component
{
    #[Title('User')]
    public function render(): View
    {
        return view('livewire.user-index');
    }
}
