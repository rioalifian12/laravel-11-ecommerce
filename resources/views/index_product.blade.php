<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Product</title>
</head>
<body>
    @foreach ($products as $product)
        <p>Name: {{ $product->name }}</p>
        <img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->image }}" height="100px" >
        <form action="{{ route('show_product', $product) }}" method="get">
            <button type="submit">Show Detail</button>
        </form>
        <form action="{{ route('delete_product', $product) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach
</body>
</html>