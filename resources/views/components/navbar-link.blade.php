@props(['active' => false])

<li>
    <a {{ $attributes }}
        class="block py-2 px-3 text-white bg-blue-700 rounded md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
        aria-current="page">{{ $slot }}</a>
</li>
