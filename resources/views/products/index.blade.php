@extends('layouts.layout')
@section('content')

    <h1 class="text-center my-3">Table</h1>
    <a href="{{ url('add-product') }}" class="btn btn-primary mb-2">Add Product</a>
        @if (session()->exists('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->exists('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category_ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $productVal)                               
                <tr>
                    <td>{{ $productVal->id }}</td>
                    <td>{{ $productVal->title }}</td>
                    <td>{{ $productVal->price }}</td>
                    <td>{{ $productVal->category->name }}</td>
                    <td><img src="{{ asset('storage/images/products/' . $productVal->image)}}" style="height: 50px;"/></td>
                    <td>
                        <a href="{{ url('/edit-product/' . $productVal->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/delete-product/' . $productVal->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{ $products->links() }}</div>
        
@endsection