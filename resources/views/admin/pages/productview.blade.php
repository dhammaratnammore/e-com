@extends('admin.layout.dashboard')
@section('titel', 'View Product')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h4 class="mb-4 text-white">Product Details</h4>

        <div class="mb-3 text-white">
            <strong>Name:</strong> {{ $product->name }}
        </div>

        <div class="mb-3 text-white">
            <strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}
        </div>

        <div class="mb-3 text-white">
            <strong>Price:</strong> ${{ $product->price }}
        </div>

        <div class="mb-3 text-white">
            <strong>Description:</strong> {{ $product->description }}
        </div>

        <div class="mb-3 text-white">
            <strong>Image:</strong><br>
            @if($product->image)
                <img src="{{ asset('uplode/' . $product->image) }}" width="300">
            @else
                No image
            @endif
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-light">Back</a>
    </div>
</div>

@endsection
