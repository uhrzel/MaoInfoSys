<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports PDF</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Reports</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Report Title</th>
                <th>Report Description</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->report_title }}</td>
                <td>{{ $report->report_description }}</td>
                <td>{{ $report->status }}</td>
                <td>{{ $report->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>