<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>
<body>
    <a href="{{ route('store-api-data') }}">Import Data</a>
    <br>
    <table id="table" class="display">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Tool number</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Date</th>
                <th>Bat percentage</th>
                <th>Import date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $single)
                <tr>
                    <td>{{ $single->transaction_id }}</td>
                    <td>{{ $single->tool_number }}</td>
                    <td>{{ $single->latitude }}</td>
                    <td>{{ $single->longitude }}</td>
                    <td>{{ $single->date }}</td>
                    <td>{{ $single->bat_percentage }}</td>
                    <td>{{ $single->import_date }}</td>
                </tr>
            @empty
                <tr>
                    <td>No data found...</td>
                </tr>
            @endforelse

        </tbody>
    </table>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
</body>
</html>