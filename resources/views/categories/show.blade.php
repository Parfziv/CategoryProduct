@extends('layout.master')
@section('content')
<div class="card">
    <div class="card-header"  style="display: flex; justify-content: space-between;">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Category: {{ $category->name }}</h3>
        <div class="card-tools">
            <a class="btn btn-success btn-sm" href="{{ route('categories.index') }}"> Go Back</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td>ID:</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>{{ $category->name }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection