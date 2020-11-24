<div>
    <p>{{ $content }}</p>

    <form method="post" wire:submit.prevent="create"> <!-- "prevent" para parar o evento default do livewire -->
        <input type="text" name="content" id="content" wire:model="content">

        @error('content') {{ $message }} @enderror

        <button type="submit">Criar tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}

        @if ($tweet->likes->count())
            [ <a href="#" wire:click.prevent="unlike({{ $tweet }})">descurtir</a> ]
        @else
            [ <a href="#" wire:click.prevent="like({{ $tweet->id }})">curtir</a> ]
        @endif
        <br>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
