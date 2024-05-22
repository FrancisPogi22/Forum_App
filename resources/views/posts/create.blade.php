<x-layout>
    <h1 class="text-3xl font-bold mt-4 text-center">Create Post</h1>
    <div class="max-w-2xl mx-auto p-4 bg-slate-200 rounded-lg drop-shadow-lg mt-4">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TItle</label>
                <input type="text" id="large-input" name="title" placeholder="Title" required
                    class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="message" rows="4" name="content" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your content here..."></textarea>
            </div>
            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Post</button>
            </div>
        </form>
    </div>
</x-layout>
