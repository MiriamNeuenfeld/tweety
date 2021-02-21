@extends('profiles.resources.views.components.app')

@section('content')
    <header class="mb-6 relative">

        <div class="relative">
            <img
                src="/images/default-profile-banner.jpg"
                alt=""
                class="mb-2 object-cover h-75 w-full rounded-lg"
            >

            <img
                src="{{ $user->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 -translate-y-1/2"
                style="left: 50%"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @if(auth()->user()->id == $user->id)
                    <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit
                        Profile</a>
                @endif

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <div class="text-sm">
            Bugs Bunny ist der Name eines Trickfilm-Hasen oder -Kaninchens, der den Warner-Bros.-Zeichentrick-Studios
            entstammt.
        </div>
    </header>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
@endsection
