<x-layout>
    <section class="mt-4 flex justify-between items-center">
        <h1 class="text-5xl font-bold">Posts</h1>
        <div class="flex justify-end gap-2">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}"
                    class="shadow-lg shadow-indigo-500/40 focus:outline-none text-white bg-indigo-500 hover:bg-indigo-700 transition-colors focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-yellow-900">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="shadow-lg shadow-red-500/40 focus:outline-none text-white bg-red-700 hover:bg-red-800 transition-colors focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                </form>
            @endcan
        </div>
    </section>
    <div class="max-w-6xl mx-auto sm-px-6 lg:px-8 mt-8 bg-indigo-100 rounded-lg drop-shadow-lg">
        <h1 class="text-3xl text-indigo-500 font-semibold pt-4">{{ $post->title }}</h1>
        <main class="max-w-6xl mx-auto lg:mt-4 space-y-6 pb-4">
            <p class="text-gray-700 pb-4">{{ $post->content }}</p>
            <div class="comment-con">
                @foreach ($comments as $comment)
                    <p class="mb-2 text-right text-sm text-slate-400">{{ count($comments) }} Comments</p>
                    <div class="comment-widget bg-slate-100 drop-shadow-md rounded-lg p-4 flex justify-between">
                        <div class="comment-details">
                            <p class="font-semibold">{{ $comment->name }}</p>
                            <p class="text-sm">{{ $comment->comment }}</p>
                            <p class="text-xs mt-4 text-slate-400">
                                {{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y h:ia') }}</p>
                        </div>
                        <div class="btn-con flex">
                            @can('update', $comment)
                                <a href="{{ route('comments.edit', $comment->id) }}"
                                    class="focus:outline-none text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                            @endcan
                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="comment-input-con">
                <form action="{{ route('comments.store') }}" method="POST" class="flex relative items-center">
                    @csrf
                    <input type="number" name="post_id" value="{{ $post->id }}" hidden>
                    <input
                        type="text"class="@error('comment') border-red-500 @enderror border-1 border-indigo-500 text-sm rounded-full p-4 w-full"
                        name="comment" placeholder="Comment here..." required>
                    @error('comment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <button type="submit"
                        class="text-white shadow-lg shadow-indigo-500/40 absolute right-2 bg-indigo-500 hover:bg-blue-800 transition-colors focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comment</button>
                </form>
            </div>
        </main>
    </div>
</x-layout>
