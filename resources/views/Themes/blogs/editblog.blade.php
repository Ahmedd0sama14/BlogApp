@extends('Themes.master')
@section('title', 'Edit Blog')
@section('Blogs-active', 'active')
@section('content')
    @include('Themes.partials.hero', ['title' => 'Blog Edit'])

    <section class="section-margin--small section-margin">
        <div class="container">
            <!-- Alerts -->
            <x-alert type="success"  />
            <x-alert type="error"  />

            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('blogs.update', ['blog' => $blog]) }}" method="POST" enctype="multipart/form-data"
                        class="blog-form p-4 shadow-sm rounded bg-white">
                        @csrf
                        @method('PUT')

                        <!-- Blog Name -->
                        <div class="form-group mb-3">
                            <label for="name">Blog Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter blog name" value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="form-group mb-3">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            <small class="text-danger">{{ $message }}</small>
                        </div>

                        <!-- Image -->
                        <div class="form-group mb-3">
                            <label for="image">Blog Image</label>
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid mb-2">
                            <input type="file" class="form-control" name="image" id="image">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Content -->
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea class="rich-textarea form-control" name="content" id="content" placeholder="Write your blog content...">{{ $blog->content }}</textarea>
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
