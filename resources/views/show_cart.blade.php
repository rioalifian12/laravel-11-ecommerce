<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    @if ($carts->isEmpty())
        <p>Tidak ada data</p>
    @else
        @foreach ($carts as $cart)
            <img src="{{ url('storage/' . $cart->product->image) }}" alt="{{ $cart->product->image }}" height="100px">
            <p>Name: {{ $cart->product->name }}</p>
            <p>Amount: {{ $cart->amount }}</p>
        @endforeach
    @endif
    
</body>
</html>