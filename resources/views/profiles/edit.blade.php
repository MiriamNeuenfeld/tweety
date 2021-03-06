<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name"
            >
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $user->name }}"
                   required
            >

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="username"
            >
                Username
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="username"
                   id="username"
                   value="{{ $user->username }}"
                   required
            >

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="description"
            >
                Description
            </label>

            <textarea class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="description"
                   id="description"
                   value="{{ $user->description }}"
                   required
            >{{ $user->description }}</textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="avatar"
            >
                Avatar
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full mr-2"
                       type="file"
                       name="avatar"
                       id="avatar"
                       accept="image/*"
                >

                <img
                    src="{{ $user->avatar }}"
                    alt="your avatar"
                    class="rounded-full mr-2 object-cover w-full"
                    style="width: 50px; height: 50px"
                >
            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="banner"
            >
                Banner
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full mr-2"
                       type="file"
                       name="banner"
                       id="banner"
                       accept="image/*"
                >

                <img
                    src="{{ $user->banner }}"
                    alt="your banner"
                    class="rounded-full mr-2 object-cover w-full"
                    style="width: 50px; height: 50px"
                >
            </div>

            @error('banner')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email"
            >
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ $user->email }}"
                   required
            >

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
            >
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>
</x-app>
