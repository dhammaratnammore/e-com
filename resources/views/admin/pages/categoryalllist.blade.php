@extends('admin.layout.dashboard')
@section('titel', 'catagorylist')
@section('admincontent')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $cat)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $cat->name }}</td>
                            <td>
                                @if($cat->image)
                                    <img src="{{ asset('uplode/' . $cat->image) }}" alt="Category image" width="200">
                                @else
                                    No image
                                @endif
                            </td>
                                <td>

                                    <a href="{{ route('category.view', $cat->id) }}" class="btn btn-info m-2">View</a>
                                    <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-warning m-2">Edit</a>
                                        <a href="{{ route('category.destroy',$cat->id) }}">
                                        <button type="submit" class="btn btn-danger btn-m-2" onclick="return confirm('Are you sure you want to delete this category?')">
                                            Delete
                                        </button></a>
                                    
                                </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
