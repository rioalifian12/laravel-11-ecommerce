@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>

                    <div class="card-body">
                        {{-- menampilkan error --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-group m-auto">
                            {{-- pengkondisian jika data kosong --}}
                            @if ($carts->isEmpty())
                                <p>Tidak ada data</p>
                            @else
                                @foreach ($carts as $cart)
                                <div class="card m-3" style="width: 14rem;">
                                    <img src="{{ url('storage/' . $cart->product->image) }}" class="card-img-top" alt="{{ $cart->product->image }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mt-3">
                                                <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value={{ $cart->amount }}>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary">Update amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount
                                @endphp
                                @endforeach
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <p>Total: Rp. {{ $total_price }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Checkout</button>
                                {{-- <button type="submit" class="btn btn-primary" @if ($carts->isEmpty()) disabled @endif>
                                    Checkout
                                </button> --}}
                            </form>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection