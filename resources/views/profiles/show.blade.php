@extends('profiles.resources.views.components.app')

@section('content')
    <header class="mb-6 relative">

        <img
            src="/images/default-profile-banner.jpg"
            alt=""
            class="mb-2 object-cover h-75 w-full rounded-lg"
        >

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div>
                @if(auth()->user()->id == $user->id)
                    <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit
                        Profile</a>
                @endif
                <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow Me</a>
            </div>
        </div>

        <div class="text-sm">
            Bugs Bunny ist der Name eines Trickfilm-Hasen oder -Kaninchens, der den Warner-Bros.-Zeichentrick-Studios
            entstammt.
        </div>

        <img
            src="{{ $user->avatar }}"
            alt="your avatar"
            class="rounded-full mr-2 absolute"
            style="width: 150px; left: calc(50% - 75px); top: 138px"
        >

    </header>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
@endsection
