<?php

namespace App\Livewire;

use App\Models\{Escola, User};
use Livewire\Attributes\Url;
use Livewire\{Component, WithPagination};

class UserActivityIndex extends Component
{
    use WithPagination;

    public $escola_id;

    #[Url]
    public string $search = '';

    public $perPage = '5';

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '5'],
    ];

    public function render()
    {
        if (auth()->user()->roles()->first()->title === 'Admin') {
            $users = User::pesquisa($this->search)
                ->escola_id($this->escola_id)
                ->orderBy('ultimo_acesso_at', 'desc')->paginate($this->perPage);
        } else {
            $users = User::where('escola_id', auth()->user()->escola_id)
                ->orderBy('ultimo_acesso_at', 'desc')
                ->paginate();
        }

        $escolas = Escola::get(['id', 'name']);

        return view(
            'livewire.user-activity-index',
            compact('users', 'escolas')
        );
    }
}
