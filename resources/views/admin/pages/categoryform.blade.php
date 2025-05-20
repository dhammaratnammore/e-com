@extends('admin.layout.dashboard')
@section('titel', 'catagoryform')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Category</h6>

        <form action="{{ url('/categorystore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Category name" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-white">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-success">Add Category</button>
        </form>

    </div>
</div>

@endsection
