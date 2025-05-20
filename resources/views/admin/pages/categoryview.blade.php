@extends('admin.layout.dashboard')
@section('titel', 'View Category')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h4 class="mb-4 text-white">Category Details</h4>

        <div class="mb-3 text-white">
            <strong>Name:</strong> {{ $category->name }}
        </div>

        <div class="mb-3 text-white">
            <strong>Image:</strong><br>
            @if($category->image)
                <img src="{{ asset('uplode/' . $category->image) }}" width="300">
            @else
                No image
            @endif
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-light">Back</a>
    </div>
</div>

@endsection
