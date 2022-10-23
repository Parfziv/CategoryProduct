@extends('layout.master')
@section('title', 'All Categories')
@section('js')
<script>
    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            document.querySelector('#delete-' + id).submit();
        }
    }
</script>
@endsection
@section('content')
<x-alert/>
<div class="card">
    <div class="card-header" style="display: flex; justify-content:space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Categories</h3>
        <div class="card-tools">
            <a class="btn btn-info btn-md" style="color: white" href="{{ route('categories.create') }}"> Add New</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->category_id)
                    <a href="{{ route('categories.show', $category->category_id) }}">{{ $category->category?->name }}</a>
                    @endif
                    </td>
                </td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn">View</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn">Edit</a>
                    <a href="#" onclick="deleteCategory({{ $category->id }})" class="btn">Delete</a>
                    <form style="display:none" method="POST" id="delete-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (count($categories) == 0)
        <p style="text-align: center; color: red;">Please add some category first.</p>
    @endif
    </div>
</div>

@endsection