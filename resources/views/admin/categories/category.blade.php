@extends('admin.partials.master')

@section('title', 'Categories')

@section('content')
    <div class="container mt-4">
        <x-alert type="success" />
        <h2>Categories</h2>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
            Add New Category
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
