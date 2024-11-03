<x-admin-layout>
    <!-- Main Content -->
    <div class="main-content p-6">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">DASHBOARD</h2>
        <!-- Dashboard Stats -->
        <div class="dashboard-stats grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach (['Ongoing Visits', 'Completed Visits', 'Total Users'] as $stat)
                <a href="#"
                    class="block max-w-sm p-6 bg-white border rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-3xl text-center font-bold tracking-tight text-gray-900 dark:text-white">10</h5>
                    <p class="font-normal text-center text-gray-700 dark:text-gray-400">{{ $stat }}</p>
                </a>
            @endforeach
        </div>
        <!-- Charts -->
        <div class="chart-container grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            @foreach (['Visitor Status', "Today's Visitors"] as $chart)
                <div class="chart-box bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">{{ $chart }}</h3>
                    <canvas id="{{ Str::slug($chart) }}Chart"></canvas>
                </div>
            @endforeach
        </div>
        <h3 class="text-xl font-semibold mb-4 text-gray-600 dark:text-gray-200">Visit Logs</h3>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (['ID', 'Visitor Name', 'Inmate Name', 'Relationship', 'Time-In', 'Time-Out', 'Date'] as $header)
                            <th scope="col" class="px-6 py-3">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach (range(1, 3) as $i)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">AW1</th>
                            <td class="px-6 py-4">John doe</td>
                            <td class="px-6 py-4">Theris Carroz</td>
                            <td class="px-6 py-4">Friend</td>
                            <td class="px-6 py-4">10:00am</td>
                            <td class="px-6 py-4">12:00pm</td>
                            <td class="px-6 py-4">10-10-2024</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <div class="flex flex-col items-center">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
                        class="font-semibold text-gray-900 dark:text-white">10</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">100</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Prev
                    </button>
                    <button
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
