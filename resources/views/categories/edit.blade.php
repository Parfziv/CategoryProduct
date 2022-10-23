@extends('layout.master')
@section('title', 'Edit Category')
@section('content')
<x-alert/>
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Edit Category: {{ $category->name }}</h3>
        <div class="card-tools">
            <a class="btn btn-success btn-sm" href="{{ route('categories.index') }}">
                <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? $category->name }}">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Parent Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @endif">
                    <option value="">No Parent</option>
                    @foreach($categories as $cat)
                    <option
                        value="{{ $cat->id }}"
                        @if($category->category_id == $cat->id ) selected @endif
                    >{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4">
                <i class="fas fa-user-plus fa-fw mr-1"></i> Update Category
            </button>
        </form>

    </div>
</div>
@endsection