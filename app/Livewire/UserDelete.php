<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\{Locked, On};
use Livewire\Component;

class UserDelete extends Component
{
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
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro excluído com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não excluído!');

        $this->modalDelete = false;

        $this->dispatch('dispatch-user-delete-del')->to(UserTable::class);
    }
    public function render()
    {
        return view('livewire.user-delete');
    }
}
