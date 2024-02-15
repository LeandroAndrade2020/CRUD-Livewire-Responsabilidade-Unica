<?php

namespace App\Livewire\Post;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Contracts\View\View;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    // protected $listeners = [
    //     'post::refresh-list' => 'refreshList',
    // ];

    public function render(): Factory|View|Application
    {
        $posts = Post::paginate(5);

        return view('livewire.post.index', [
            'posts' => $posts
        ]);
    }
}
