@extends('admin.layout.dashboard')
@section('titel', 'Edit Category')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Category</h6>
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Current Image</label><br>
                @if($category->image)
                    <img src="{{ asset('uplode/' . $category->image) }}" width="200">
                @else
                    <p class="text-white">No image</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-white">New Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
