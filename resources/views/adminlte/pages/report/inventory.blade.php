<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Report</title>
</head>
<body>
    <div style="text-align: center">
        <h1>Inventory Report</h1>
        <table style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $value )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>