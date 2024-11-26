@php
    use App\Models\Visit;
@endphp

<x-admin-layout>
    <!-- Main Content -->
    <div class="main-content p-6">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">DASHBOARD</h2>
        <!-- Dashboard Stats -->
        <div class="dashboard-stats grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach ($totalCount as $status)
                <a href="#"
                    class="block max-w-sm p-6 bg-white border rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-3xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $status->count }} </h5>
                    <p class="font-normal text-center text-gray-700 dark:text-gray-400"> {{ $status->status_name }}
                        Visits</p>
                </a>
            @endforeach
        </div>
        <!-- Charts -->
        <div class="chart-container grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="chart-box bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Visitor Status</h3>
                <canvas id="visitorStatusChart" style="max-height: 300px;"></canvas>
            </div>
            <div class="chart-box bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Today's Visitors</h3>
                <canvas id="todaysVisitorsChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <h3 class="text-xl font-semibold mb-4 text-gray-600 dark:text-gray-200">Visit Logs</h3>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (['ID', 'Visitor Name', 'Inmate Name', 'Time-In', 'Time-Out', 'Date'] as $header)
                            <th scope="col" class="px-6 py-3">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $rec)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rec->visit_id }} </th>
                            <td class="px-6 py-4"> {{ $rec->visitor_name }} </td>
                            <td class="px-6 py-4"> {{ $rec->inmate_name }} </td>
                            {{-- <td class="px-6 py-4">Friend</td> --}}
                            <td class="px-6 py-4"> {{ $rec->check_in_time }} </td>
                            <td class="px-6 py-4"> {{ $rec->check_out_time }} </td>
                            <td class="px-6 py-4">10-10-2024</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <div class="flex flex-col items-center">
                {{-- <!-- Help text -->
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
                </div> --}}
                {{ $records->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    // Visitor Status Doughnut Chart
    const visitorStatusCtx = document.getElementById('visitorStatusChart').getContext('2d');
    new Chart(visitorStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'In Progress', 'Completed', 'Cancelled', 'Rejected', 'Blacklisted'],
            datasets: [{
                data: [
                    {{ $visitorStatusData['pending'] }},
                    {{ $visitorStatusData['in_progress'] }},
                    {{ $visitorStatusData['completed'] }},
                    {{ $visitorStatusData['cancelled'] }},
                    {{ $visitorStatusData['rejected'] }},
                    {{ $visitorStatusData['blacklisted'] }}
                ],
                backgroundColor: [
                    'rgba(255, 205, 86, 0.7)', // Yellow
                    'rgba(75, 192, 192, 0.7)', // Green
                    'rgba(54, 162, 235, 0.7)', // Blue
                    'rgba(255, 159, 64, 0.7)', // Orange
                    'rgba(153, 102, 255, 0.7)', // Purple
                    'rgba(201, 203, 207, 0.7)' // Gray
                ],
                borderColor: [
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    });

    // Today's Visitors Bar Chart
    const todaysVisitorsCtx = document.getElementById('todaysVisitorsChart').getContext('2d');
    new Chart(todaysVisitorsCtx, {
        type: 'bar', // Change from 'doughnut' to 'bar'
        data: {
            labels: ['Today\'s Visitors', 'Completed Visits'],
            datasets: [{
                label: 'Visitors',
                data: [
                    {{ $todaysVisitors }},
                    {{ Visit::count() - $todaysVisitors }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)', // Green for Today's Visitors
                    'rgba(201, 203, 207, 0.7)' // Gray for Others
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true, // Ensure the y-axis starts at 0
                }
            }
        }
    });
</script>
