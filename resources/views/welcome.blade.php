<x-def-layout>
    <div>
        <div class="text-4xl font-bold mb-8">
            <!-- Replace 'Your Logo' with your actual logo or image -->
            <img src="{{ asset('images/ZCJ-logo.png') }}" class="min-h-10 max-h-56" alt="ZCJ Logo" />
        </div>
        <div class="space-x-4">
            <a href="/login" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 
            font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
            dark:focus:ring-blue-800">LOGIN</a>
            <a href="{{ route('register') }}" type="button"
                class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
            focus:ring-green-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 
            dark:hover:bg-green-700 dark:focus:ring-green-800">REGISTER</a>
        </div>
    </div>
</x-def-layout>
