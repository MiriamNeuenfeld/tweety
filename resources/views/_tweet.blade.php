<div class="flex p-4 {{ $loop->last ? '' : ' border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2 object-cover w-full"
                style="width: 50px; height: 50px"
            >
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ $tweet->user->path() }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>

        @auth
            @if (current_user() != $tweet->user)
                <x-like-buttons :tweet="$tweet"/>
            @endif
        @endauth
    </div>
    @auth
        @if (current_user() == $tweet->user)
            <x-delete-button :tweet="$tweet"/>
        @endif
    @endauth
</div>
