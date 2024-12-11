@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Detail') }}</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->image }}" height="100px">
                            </div>
                            <div class="">
                                <h1>Name: {{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3>Rp. {{ $product->price }}</h3>
                                <hr>
                                <p>Stock: {{ $product->stock }} left</p>
                                <form action="{{ route('add_to_cart', $product) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('edit_product', $product) }}" method="get">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </form>
                            </div>
                        </div>
                        {{-- menampilkan error --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection