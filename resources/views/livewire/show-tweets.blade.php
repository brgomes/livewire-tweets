<div>
    <p>{{ $content }}</p>

    <form method="post" wire:submit.prevent="create"> <!-- "prevent" para parar o evento default do livewire -->
        <input type="text" name="content" id="content" wire:model="content">

        @error('content') {{ $message }} @enderror

        <button type="submit">Criar tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <div class="flex">
            <div class="w-2/8">
                @if ($tweet->user->photo)
                    <img src="{{ url('storage/' . $tweet->user->photo) }}" alt="" class="rounded-full h-8 w-8" title="{{ $tweet->user->name }}">
                @else
                    <img src="{{ url('imgs/no-image.png') }}" alt="" class="rounded-full h-8 w-8">
                @endif

                {{ $tweet->user->name }}
            </div>

            <div class="w-6/8">
                {{ $tweet->content }}

                @if ($tweet->likes->count())
                    [ <a href="#" wire:click.prevent="unlike({{ $tweet }})">descurtir</a> ]
                @else
                    [ <a href="#" wire:click.prevent="like({{ $tweet->id }})">curtir</a> ]
                @endif
            </div>
        </div>

        <br>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
