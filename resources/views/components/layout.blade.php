<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forum App</title>
</head>

<body class="bg-indigo-50">
    <x-navbar />
    <div class="max-w-6xl mx-auto">
        {{ $slot }}
    </div>
</body>

</html>
