@extends('admin.partials.master')
@section('title', 'Edit Category')
@section('content')
<div class="container mt-4">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
