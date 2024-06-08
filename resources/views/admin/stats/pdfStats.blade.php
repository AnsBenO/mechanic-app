<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.statistics') }} PDF</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .stat-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 120px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #333;
            text-align: center;
            padding: 1rem;
            margin-bottom: 20px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .stat-label {
            font-size: 1rem;
            font-style: italic;
            color: #6b7280;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        .chart-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .chart-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ __('messages.statistics') }}</h1>
        <div class="grid-container">
            <div class="stat-card">
                <div class="stat-value">{{ $usersNumber }}</div>
                <div class="stat-label">{{ __('messages.clients') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $vehiclesNumber }}</div>
                <div class="stat-label">{{ __('messages.vehicles') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $partsNumber }}</div>
                <div class="stat-label">{{ __('messages.spare_parts') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $reparationsNumber }}</div>
                <div class="stat-label">{{ __('messages.repairs') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $invoicesNumber }}</div>
                <div class="stat-label">{{ __('messages.invoices') }}</div>
            </div>
        </div>

        <!-- Chart images -->
        <div class="chart-container">
            <img src="{{ $chart1 }}" alt="{{ __('messages.pie_chart') }}">
        </div>
        <div class="chart-container">
            <img src="{{ $chart2 }}" alt="{{ __('messages.bar_chart') }}">
        </div>
    </div>
</body>

</html>
