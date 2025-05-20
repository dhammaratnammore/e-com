@extends('admin.layout.dashboard')
@section('titel', 'productform')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Product</h6>

        <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Category name" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-white">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    
                    <h6 class="mb-4">Select Category</h6>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">
                        <option selected disabled>Select Category</option>
                        @foreach($category as $cat) <!-- Correct reference to the variable -->
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="price" class="form-control" id="floatingInput" placeholder="name">
                <label for="floatingInput">Price</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <button type="submit" class="btn btn-success">Add Product</button>
        </form>

    </div>
</div>

@endsection
