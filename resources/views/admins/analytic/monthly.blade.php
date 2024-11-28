<x-admin-layout>
    <main class="m-6">
        <!-- Set the title with white text color -->
        <h1 id="chart-title" class="text-center mb-5 text-2xl font-semibold text-blue-600"></h1>
        <canvas id="monthlyVisitorsChart" width="400" height="200"></canvas>
        <script>
            // Data passed directly from the backend
            const labels = @json($labels); // E.g., ["January 2024", "February 2024", ...]
            const visitors = @json($visitors); // E.g., [300, 250, ...]

            // Get the chart context
            const ctx = document.getElementById('monthlyVisitorsChart').getContext('2d');

            // Render the chart
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // Use labels from backend
                    datasets: [{
                        label: 'Number of Visitors for Each Month',
                        data: visitors, // Use visitors count from backend
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Monthly Visitors',
                            color: '#ffffff', // Title text color set to white
                            font: {
                                size: 20,
                                weight: 'bold',
                                color: '#ffffff' // Title font color set to white
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => `${context.raw} Visitors`
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff' // X-axis labels font color set to white
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Y-axis labels font color set to white
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Set the chart title to "Monthly Visitors"
            document.getElementById('chart-title').innerText = "Monthly Visitors for " + new Date().getFullYear();
        </script>
    </main>
</x-admin-layout>
