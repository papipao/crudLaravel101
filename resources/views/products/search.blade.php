@extends('layouts.layout')
@section('content')
    <h1 class="text-center my-3">Table</h1>
    <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category_ID</th>
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
                    <td>
                        <a href="{{ url('/edit-product/' . $productVal->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/delete-product/' . $productVal->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection