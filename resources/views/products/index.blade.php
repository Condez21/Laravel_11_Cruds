@extends('layouts.app')

@section('content')
    <div class="card">
<div class="card-header">Product List</div>
<div class="card-body">
<a href="{{ route('products.create') }}" class="btn
btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New
Product</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $product->code }}</td>
                        <td class="text-center">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="80">
                            @else
                                No Image
                            @endif
                        </td>
                        
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
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