<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />
    <main class="flex flex-row min-h-screen bg-gray-300 dark:bg-gray-800">
        <aside class="w-1/5 bg-gray-200 dark:bg-gray-700">
            <!-- Sidebar content here -->
            <x-adminSidebar />
        </aside>
        <section class="w-4/5 p-4">
            <!-- Table content here -->
            {{ $slot }}
        </section>
    </main>
    <x-footer />
    @include('components.Infromation-pop-up')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>

    </script>
</body>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/function.js') }}"></script>


</html>
