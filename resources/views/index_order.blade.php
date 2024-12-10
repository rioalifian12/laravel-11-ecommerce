<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    @foreach ($orders as $order)
        <p>{{ $order->id }}</p>
        <p>{{ $order->user->name }}</p>
        <p>{{ $order->created_at }}</p>
        <p>
            @if ($order->is_paid == true)
                Paid
            @else
                Unpaid
                @if ($order->payment_receipt)
                    <a href="{{ url('storage/' . $order->payment_receipt) }}">Show payment receipt</a>
                @endif
                <form action="{{ route('confirm_payment', $order) }}" method="post">
                    @csrf
                    <button type="submit">Confirm</button>
                </form>
            @endif
        </p>
    @endforeach
</body>
</html>