@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Name</label><br>
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <label>Price</label><br>
                                <input type="number" name="price" placeholder="Price" class="form-control" value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label>Stock</label><br>
                                <input type="number" name="stock" placeholder="Stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            <div class="form-group">
                                <label>Image</label><br>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection