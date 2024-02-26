<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\UserForm;

class UserTable extends Component
{
    use WithPagination;
    use WithSorting;

    public UserForm $form;

    public $paginate = 5;

    public $sortBy = 'users.updated_at';

    public $sortDirection = 'desc';

    #[On('dispatch-user-create-save')]
    #[On('dispatch-user-create-edit')]
    #[On('dispatch-user-delete-del')]
    public function render()
    {
        return view('livewire.user-table', [

            'data' => User::where('id', 'like', '%' . $this->form->id . '%')
                ->where('name', 'like', '%' . $this->form->name . '%')
                ->where('email', 'like', '%' . $this->form->email . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]

    );
    }
}
