<x-app>
    <div>
        <div class="grid grid-cols-3 gap-4 mb-5">
            @foreach($users as $user)
                @if ($user != current_user())
                    <a href="{{ $user->path() }}" class="flex items-center">
                        <img
                            src="{{ $user->avatar }}"
                            alt="{{ $user->username }}'s avatar"
                            class="rounded-full mr-2 object-cover w-full mr4"
                            style="width: 60px; height: 60px"
                        >

                        <div>
                            <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                        </div>

                        @if (current_user()->following($user))
                            <div class="">✔</div>
                        @endif
                    </a>
                @endif
            @endforeach
        </div>

        <div>
            {{ $users->links() }}
        </div>
    </div>
</x-app>
