<div class="bg-gray-200 rounded-lg py-4 px-6">

    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->follows as $user)
            <li class="mb-4">
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mr-2 object-cover w-full"
                        style="width: 40px; height: 40px"
                    >

                    {{ $user->name }}
                </a>
            </li>
        @empty
            <li>No friends yet.</li>
        @endforelse
    </ul>

</div>
