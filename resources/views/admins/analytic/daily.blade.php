<x-admin-layout>
    <main class="m-6">
        <!-- Set the title with white text color -->
        <h1 id="chart-title" class="text-center mb-5 text-2xl font-semibold text-blue-600"></h1>
        <canvas id="dailyVisitorsChart" width="400" height="200"></canvas>
        <script>
            // Data passed directly from the backend
            const labels = @json($labels); // E.g., ["Monday", "Tuesday", ...]
            const visitors = @json($visitors); // E.g., [30, 50, ...]

            // Get the chart context
            const ctx = document.getElementById('dailyVisitorsChart').getContext('2d');

            // Render the chart
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // Use labels from backend
                    datasets: [{
                        label: 'Number of Visitors Visited for the Week',
                        data: visitors, // Use visitors count from backend
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    }]
                    
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Daily Visitors',
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
                                color: '#ffffff' // X-axis labels color set to white
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Y-axis labels color set to white
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Set the dynamic date title
            const today = new Date();
            document.getElementById('chart-title').innerText =
                today.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric'
                });
        </script>
    </main>
</x-admin-layout>
