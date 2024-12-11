@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Detail') }}</div>

                    <div class="card-body">
                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

                        @if ($order->is_paid == true)
                            <p class="card-text">Paid</p>
                        @else
                            <p class="card-text">Unpaid</p>
                        @endif
                        <hr>
                        @foreach ($order->transactions as $transaction)
                            <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                            <p></p>
                        @endforeach
                        <hr>
                        @if ($order->is_paid == false && $order->payment_receipt == null)
                            <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label>Upload your payment receipt</label>
                                <input type="file" name="payment_receipt" class="form-control">
                                <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection