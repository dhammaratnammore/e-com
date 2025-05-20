@extends('admin.layout.dashboard')
@section('titel', 'Edit Product')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Product</h6>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label text-white">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Current Image</label><br>
                @if($product->image)
                    <img src="{{ asset('uplode/' . $product->image) }}" width="200">
                @else
                    No image
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label text-white">New Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>

@endsection
