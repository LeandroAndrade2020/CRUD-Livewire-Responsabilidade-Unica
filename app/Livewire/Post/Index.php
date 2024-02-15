<?php

namespace App\Livewire\Post;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

use App\Livewire\Post\Delete;
use App\Livewire\Post\Update;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

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

    public function update(Post $post): void
    {
        $this->dispatch(Update::class, 'post::update::load', $post);
    }

    public function delete(Post $post): void
    {
        $this->dispatch(Delete::class, 'post::delete::load', $post);
    }
}
