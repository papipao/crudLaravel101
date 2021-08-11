@extends('layouts.layout')
@section('content')
    <h1 class="text-center my-3">Table</h1>
    <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categoryVal)                               
                <tr>
                    <td>{{ $categoryVal->id }}</td>
                    <td>{{ $categoryVal->name }}</td>
                    <td>
                        <a href="{{ url('/edit-category/' . $categoryVal->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/delete-category/' . $categoryVal->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection