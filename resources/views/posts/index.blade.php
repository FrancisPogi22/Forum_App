<x-layout>
    <section class="mt-4">
        <div class="flex justify-between items-center">
            <h1 class="text-5xl font-bold mb-4">Posts</h1>
            <a href="{{ route('posts.create') }}"
                class="focus:outline-none shadow-lg shadow-indigo-500/40 text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                Post</a>
        </div>
    </section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if (isset($posts))
            @foreach ($posts as $post)
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 shadow-lg shadow-indigo-300/40 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-500 dark:text-white">
                            {{ $post->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>
                    <a href="/posts/{{ $post->id }}"
                        class="inline-flex shadow-lg shadow-indigo-500/40 items-center transition-colors px-3 py-2 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>
