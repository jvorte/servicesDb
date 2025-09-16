<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $vehicle->brand }} {{ $vehicle->model }} - Services Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Services Report - {{ $vehicle->brand }} {{ $vehicle->model }}</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Description</th>
                <th>Mileage</th>
                <th>Garage</th>
                <th>Notes</th>
                <th>Next Service</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td>{{ \Carbon\Carbon::parse($service->date)->format('Y-m-d') }}</td>
                <td>{{ $service->type }}</td>
                <td>{{ $service->extras }}</td>
                <td>{{ $service->mileage }} km</td>
                <td>{{ $service->garage ?? '-' }}</td>
                <td>{{ $service->notes ?? '-' }}</td>
                <td>{{ $service->mileage + $service->next_service }} km</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;">No services found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>