@extends('layout.master')
@section('title', 'Create Product')
@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content:space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Add New Product</h3>
        <div class="card-tools">
            <a class="btn btn-success btn-md" href="{{ route('products.index') }}">Go Back</a>
        </div>
    </div>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? "" }}">
                @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @endif" value="{{ old('price') ?? "" }}">
                @error('price')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @endif">
                    <option value="">Select Category...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Create New Product</button>
        </div>
        </div>
    </form>
</div>

@endsection