<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    {{-- menampilkan error --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    {{-- pengkondisian jika data kosong --}}
    @if ($carts->isEmpty())
        <p>Tidak ada data</p>
    @else
        @foreach ($carts as $cart)
            <img src="{{ url('storage/' . $cart->product->image) }}" alt="{{ $cart->product->image }}" height="100px">
            <p>Name: {{ $cart->product->name }}</p>
            <br>
            <form action="{{ route('update_cart', $cart) }}" method="post">
                @method('patch')
                @csrf
                <input type="number" name="amount" value={{ $cart->amount }}>
                <button type="submit">Update amount</button>
            </form>
            <form action="{{ route('delete_cart', $cart) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
            </form>
        @endforeach
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    @endif
    
</body>
</html>