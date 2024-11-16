<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />
    <main class="flex flex-col items-center justify-center min-h-screen bg-gray-300 dark:bg-gray-800">
        <!-- Table content here -->
        {{ $slot }}
    </main>
    <x-footer />
    @if (session('success') || session('error') || session('fail') || session('info'))
        <div id="session-message"
            class="z-50 fixed top-4 left-1/2 transform -translate-x-1/2 p-4 rounded shadow-lg
         {{ session('success') ? 'bg-green-500' : '' }}
         {{ session('error') ? 'bg-red-500' : '' }}
         {{ session('fail') ? 'bg-yellow-500' : '' }}
         {{ session('info') ? 'bg-blue-500' : '' }}">
            {{ session('success') ?? (session('error') ?? (session('fail') ?? session('info'))) }}
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</body>

</html>
