<div class="px-10 py-5">
    <h1 class="text-2xl text-gray-500 mb-5">{{ __('messages.statistics') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5">
        <div class="stat-card">
            <div class="stat-value text-amber-500">{{ $usersNumber }}</div>
            <div class="stat-label text-gray-500">{{ __('messages.clients') }}</div>
            <div class="stat-icon"><i class="fa-solid fa-people-group text-3xl text-gray-500"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-value text-amber-500">{{ $vehiclesNumber }}</div>
            <div class="stat-label text-gray-500">{{ __('messages.vehicles') }}</div>
            <div class="stat-icon"><i class="fa-solid fa-car text-3xl text-gray-500"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-value text-amber-500">{{ $partsNumber }}</div>
            <div class="stat-label text-gray-500">{{ __('messages.spare_parts') }}</div>
            <div class="stat-icon"><i class="fa-solid fa-cogs text-3xl text-gray-500"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-value text-amber-500">{{ $reparationsNumber }}</div>
            <div class="stat-label text-gray-500">{{ __('messages.repairs') }}</div>
            <div class="stat-icon"><i class="fa-solid fa-wrench text-3xl text-gray-500"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-value text-amber-500">{{ $invoicesNumber }}</div>
            <div class="stat-label text-gray-500">{{ __('messages.invoices') }}</div>
            <div class="stat-icon"><i class="fa-solid fa-file-invoice text-3xl text-gray-500"></i></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
        <div class="chart-container">
            <canvas class="myPieChart1"></canvas>
        </div>
        <div class="chart-container">
            <canvas class="myPieChart2"></canvas>
        </div>
    </div>
</div>
