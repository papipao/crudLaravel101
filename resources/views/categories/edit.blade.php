@extends('layouts.layout')
@section('content')
     <form action="{{ url('/edit-category/' . $categories->id) }}" method="post" style="max-width: 560px; margin: 0 auto;">
        @csrf
        @method('PUT')
        <h3 class="text-center my-3">Add Category</h3>
        <div class="row g-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" name="name" value="{{ old('name') ?? $categories->name }}" placeholder="Name" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit </button>
    </form>
@endsection