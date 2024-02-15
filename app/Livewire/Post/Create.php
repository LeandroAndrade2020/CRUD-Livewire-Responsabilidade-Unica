<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Create extends Component
{

    public Post $post;

    public bool $modal = false;

    protected array $validationAttributes = [
        'post.title' => 'titulo',
        'post.body' => 'texto',
        'post.user_id' => 'usuário'
    ];

    public function mount(): void
    {
        $this->post();

        // dd($this->post);
    }


    public function render(): View
    {
        return view('livewire.post.create');
    }

    public function rules(): array
    {
        return [
            'post.title' => 'required',
            'post.body' => 'required',
            'post.user_id' => 'required'
        ];
    }

    public function create(): void
    {
        $this->validate();

        $this->modal = false;

        try{
            $this->post->save();

            // $this->emitUp('post::index::refresh');

            session()->flash('message', 'Post criado com sucesso!');

        } catch (\Exception $exception) {

            report($exception);

        } finally {

            $this->post();

        }

        session()->flash('error', 'erro ao criar o post!');
    }
}
