@extends('layouts.layout')
@section('content')

    <h1 class="text-center my-3">Table</h1>
    <a href="{{ url('add-category') }}" class="btn btn-primary mb-2">Add Category</a>
        @if (session()->exists('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->exists('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>       
        @endif
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