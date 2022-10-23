@extends('layout.master')
@section('title', 'All Products')
@section('js')
<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            document.querySelector('#delete-' + id).submit();
        }
    }
</script>
@endsection
@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content:space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Products</h3>
        <div class="card-tools">
            <a class="btn btn-info btn-md" style="color: white" href="{{ route('products.create') }}"> Add New</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category?->name }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn">Edit</a>
                    <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn">Delete</a>
                    <form style="display:none" method="POST" id="delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @if (count($products) == 0)
        <p style="text-align: center; color: red;">Please add some product first.</p>
    @endif
    </div>
</div>

@endsection