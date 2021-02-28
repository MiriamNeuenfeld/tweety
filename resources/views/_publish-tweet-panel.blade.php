<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
{{--    @include('flash-message')--}}
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf
                    <textarea
                        name="body"
                        class="w-full"
                        placeholder="What's up doc?"
                        required
                        autofocus
                    ></textarea>

        <hr class="my-4">

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="image"
            >
                Image
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full mr-2"
                       type="file"
                       name="image"
                       id="image"
                       accept="image/*"
                >
            </div>

            @error('image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2 object-cover w-full"
                style="width: 50px; height: 50px"
            >

            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
