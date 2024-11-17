<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact Us - ZCJ Visitor Management System</title>
</head>

<body class="h-screen flex flex-col bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/ZCJ-logo.png') }}" class="h-8" alt="ZCJ Logo" />
                <span class="text-2xl font-semibold dark:text-white">ZCJ Visitor Management System</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                            us</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Contact us</a>
                    </li>
                    <li>
                        <a href="../Landing Page/landingPage.html"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Check
                            in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow dark:bg-gray-800 flex items-center justify-center p-5">
    <div class="text-center">
        <div class="p-5 mx-[500px] border-2 border-white rounded-lg">
            <h2 class="dark:text-white text-3xl mb-5">CONTACT US</h2>
            <h3 class="text-white text-lg font-semibold mb-4">Get in Touch</h3>
            <p class="text-white text-justify mb-4">
                If you have any questions or inquiries, please feel free to reach out to us:
            </p>
            <p class="text-white text-justify mb-2"><strong>Email Address:</strong> zambo_cj@yahoo.com & zamboangacityjail@gmail.com</p>
            <p class="text-white text-justify mb-4"><strong>Official Facebook Page:</strong> BJMP Zamboanga Cj</p>
            <p class="text-white text-justify mb-2"><strong>Telephone Number:</strong> (062) 991-2268</p>
            <p class="text-white text-justify mb-4"><strong>Address:</strong> Dr. Varela Street, Zone 1, Zamboanga City, Philippines 7000</p>
        </div>
    </div>
</main>



    <!-- Footer -->
    <footer class="bg-white shadow dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/ZCJ-logo.png') }}" class="h-8" alt="Flowbite Logo" loading="lazy" />
                    <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">ZCJ Visitor Management
                        System</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                    href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
        </div>
    </footer>
</body>

</html>
