<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    
    <table border="1px">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Created At</td>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>