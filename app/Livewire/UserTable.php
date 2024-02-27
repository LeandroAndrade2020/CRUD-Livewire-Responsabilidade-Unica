<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Hash;
use TallStackUi\Traits\Interactions;
use Livewire\{Component, WithPagination};

class UserTable extends Component
{
    use WithPagination;
    use WithSorting;
    use Interactions;

    public UserForm $form;

    public $paginate = 5;

    public $sortBy = 'users.updated_at';

    public $sortDirection = 'desc';

    #[On('dispatch-user-create-save')]
    #[On('dispatch-user-create-edit')]
    #[On('dispatch-user-delete-del')]
    public function render()
    {
        return view('livewire.user-table',
            [

                'data' => User::where('id', 'like', '%' . $this->form->id . '%')
                    ->where('name', 'like', '%' . $this->form->name . '%')
                    ->where('email', 'like', '%' . $this->form->email . '%')
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->paginate),
            ]
        );
    }

    public function resetPassword(User $user)
    {
        $user->password = Hash::make('Atividade1!');

        $user->save();

        $this->toast()->success('Senha redefinida para Atividade1!')->send();
    }

}
