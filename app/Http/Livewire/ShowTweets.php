<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'Apenas um tweet!!!!';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    //protected $paginationTheme = 'simple-tailwind';

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(5);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate(); // já pega o atributo $this->rules automaticamente

        /*Tweet::create([
            'user_id' => auth()->user()->id,
            'content' => $this->content,
        ]);*/

        auth()->user()->tweets()->create(['content' => $this->content]);

        $this->content = '';
    }
}
