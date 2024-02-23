<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Title;

class UserIndex extends Component
{
    #[Title('Usuários')]
    public function render(): View
    {
        return view('livewire.user.user-index');
    }
}
