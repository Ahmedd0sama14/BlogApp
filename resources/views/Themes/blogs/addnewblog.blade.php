@extends('Themes.master')
@section('content')
    @include('Themes.partials.hero', ['title' => 'Add New Blog'])

    <section class="section-margin--small section-margin">
        <div class="container">
            <!-- Alerts -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data"
                        class="blog-form p-4 shadow-sm rounded bg-white">
                        @csrf

                        <!-- Blog Name -->
                        <div class="form-group mb-3">
                            <label for="name">Blog Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter blog name" value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="form-group mb-3">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select category</option>
                                @foreach ($catogories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="form-group mb-3">
                            <label for="image">Blog Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />

                        </div>

                        <!-- Content -->
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea class="rich-textarea form-control" name="content" id="content" placeholder="Write your blog content...">{{ old('content') }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
