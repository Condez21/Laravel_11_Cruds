@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" style="max-width: 50px;">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm mx-1">View</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm mx-1">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
@endsection 