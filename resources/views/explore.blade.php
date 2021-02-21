<x-app>
    <div class="grid grid-cols-3 gap-4">
        @foreach($users as $user)
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
            </a>
        @endforeach

{{--        {{ $users->links() }}--}}
    </div>
</x-app>
