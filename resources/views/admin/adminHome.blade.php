<x-app-layout>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            .stat-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 150px;
                background-color: #2d3748;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                color: #cbd5e0;
                text-align: center;
                padding: 1rem;
                transition: transform 0.2s;
                margin-bottom: 20px;
            }

            .stat-card:hover {
                transform: translateY(-5px);
            }

            .stat-value {
                font-size: 2rem;
                font-weight: bold;
            }

            .stat-label {
                font-size: 1rem;
                font-style: italic;
                color: #a0aec0;
            }

            .stat-icon {
                margin-top: 0.5rem;
                color: #4a5568;
            }

            .chart-container {
                background-color: #1a202c;
                border-radius: 10px;
                padding: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }
        </style>
    </head>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.dashboard') }}
            </h2>
            <div class="lang text-white">
                <a href="{{ url('lang/en') }}">EN</a> |
                <a href="{{ url('lang/fr') }}">FR</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center my-6 gap-2">
                    <button onclick="exportStats()"
                        class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-amber-500 hover:bg-amber-600 text-white shadow-md">
                        {{ __('messages.export_stats') }}
                    </button>
                </div>
                <div class="w-full flex-1">
                    @include('admin.stats.stats')
                </div>
            </div>
        </div>
    </div>

    <script>
        let pieChart;
        let barChart;

        document.addEventListener('DOMContentLoaded', function() {
            const chartData = @json($chart);

            const ctx1 = document.querySelector('.myPieChart1').getContext('2d');
            const ctx2 = document.querySelector('.myPieChart2').getContext('2d');

            // Destroy existing charts if they exist
            if (pieChart) {
                pieChart.destroy();
            }
            if (barChart) {
                barChart.destroy();
            }

            // Create new charts
            pieChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['{{ __('messages.clients') }}', '{{ __('messages.vehicles') }}'],
                    datasets: [{
                        data: [chartData.clients, chartData.vehicles],
                        backgroundColor: ['#f59e0b', '#9ca3af'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            barChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['{{ __('messages.spare_parts') }}', '{{ __('messages.repairs') }}',
                        '{{ __('messages.invoices') }}'
                    ],
                    datasets: [{
                        data: [chartData.parts, chartData.reparations, chartData.invoices],
                        backgroundColor: ['#f59e0b', '#9ca3af', '#6b7280'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += ` ${context.parsed.y}`;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });

        function exportStats() {
            const chart1 = document.querySelector('.myPieChart1').toDataURL('image/png');
            const chart2 = document.querySelector('.myPieChart2').toDataURL('image/png');

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('admin.stats.pdf') }}';
            form.innerHTML = `
                @csrf
                <input type="hidden" name="chart1" value="${chart1}">
                <input type="hidden" name="chart2" value="${chart2}">
            `;

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</x-app-layout>
