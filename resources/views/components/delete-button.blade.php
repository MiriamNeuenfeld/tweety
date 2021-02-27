<div>
    <form method="POST"
          action="/tweets/{{ $tweet->id }}">
        @csrf
        @method('DELETE')

        <button type="submit"
                class="text-xs"
        >
            <div
                class="m-1">
                <img src="/images/trash.svg"
                     alt=""
                     style="height: 15px"
                >
            </div>
        </button>
    </form>
</div>
