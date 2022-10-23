@extends('layout.master')
@section('title', 'Edit Product')
@section('content')
<x-alert/>
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Edit Product: {{ $product->name }}</h3>
        <div class="card-tools">
            <a class="btn btn-success btn-sm" href="{{ route('products.index') }}">Go Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? $product->name }}">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @endif" value="{{ old('price') ?? $product->price }}">
                @error('price')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @endif">
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if($product->category_id == $cat->id ) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update Product</button>
        </form>
    </div>
</div>
@endsection