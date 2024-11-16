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
    <main class="flex flex-row min-h-screen bg-gray-300 dark:bg-gray-800">
        <aside class="w-1/4 bg-gray-200 dark:bg-gray-700 p-4">
            <!-- Sidebar content here -->
            <x-userSidebar />
        </aside>
        <section class="w-3/4 p-4">
            <!-- Table content here -->
            {{ $slot }}
        </section>
    </main>
    <x-footer />
    @if (session('success'))
        <div id="success-message"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 2000);
        });
    </script>
</body>

</html>
