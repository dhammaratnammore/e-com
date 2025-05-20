@extends('admin.layout.dashboard')
@section('titel', 'productlist')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Price</th>                     
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $pro)
                        <tr>
                            
                            <td>{{ $pro->name }}</td>
                            <td>
                                @if($pro->image)
                                    <img src="{{ asset('uplode/' . $pro->image) }}" alt="Category image" width="200">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>{{ $pro->category_name }}</td>
                            <td>{{ $pro->price }}</td>
                             <td>{{ $pro->description }}</td>
                            <td>
                                <a href="{{ route('product.view', $pro->id) }}" class="btn btn-info m-2">View</a>
                                <a href="{{ route('product.edit', $pro->id) }}" class="btn btn-warning m-2">Edit</a>
                                <a href="{{ route('deleteproduct',['id'=>$pro->id]) }}">
                                   <button type="submit" class="btn btn-danger btn-m-2" onclick="return confirm('Are you sure you want to delete this category?')">
                                        Delete
                                    </button>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
