@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Product Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Codes:</strong>
                <p>{{ $product->code }}</p>
            </div>

            <div class="mb-3">
                <strong>Name:</strong>
                <p>{{ $product->name }}</p>
            </div>

            <div class="mb-3">
                <strong>Quantity:</strong>
                <p>{{ $product->quantity }}</p>
            </div>

            <div class="mb-3">
                <strong>Price:</strong>
                <p>${{ number_format($product->price, 2) }}</p>
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                <p>{{ $product->description }}</p>
            </div>

            <div class="mb-3">
                <strong>Product Image:</strong>
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="200">
                    </div>
                @else
                    <p>No Image</p>
                @endif
            </div>

            <div class="mb-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection