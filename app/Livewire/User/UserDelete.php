<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\User\UserTable;

class UserDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalUserDelete = false;

    #[On('dispatch-user-table-delete')]
    public function set_user($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalUserDelete = true;
    }

    public function del()
    {
        $del = User::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Cadastro excluído com sucesso!')
        : $this->dispatch('notify', title: 'fail', message: 'Cadastro não excluído!');

        $this->modalUserDelete = false;

        $this->dispatch('dispatch-user-delete-del')->to(UserTable::class);
    }
    public function render()
    {
        return view('livewire.user.user-delete');
    }
}
