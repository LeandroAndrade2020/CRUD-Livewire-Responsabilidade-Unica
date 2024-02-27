<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use TallStackUi\Traits\Interactions;
use Livewire\Attributes\{Locked, On};

class UserDelete extends Component
{
    use Interactions;
    
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-user-table-delete')]
    public function set_user($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $user = User::find($this->id);

        $user->roles()->detach();

        $del = $user->destroy($this->id);

        ($del)
        ? $this->toast()->success('Cadastro excluído com sucesso!')->send()
        : $this->toast()->error('Cadastro não excluído!')->send();

        $this->modalDelete = false;

        $this->dispatch('dispatch-user-delete-del')->to(UserTable::class);
    }
    public function render()
    {
        return view('livewire.user-delete');
    }
}
