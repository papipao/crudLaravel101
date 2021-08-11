@extends('layouts.layout')
@section('content')
    <form action="{{ route('category.store') }}" method="post" style="max-width: 560px; margin: 0 auto;">
        @csrf
        <h3 class="text-center my-3">Add Category</h3>
        @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>  
                </div>   
            @endif
        <div class="row g-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit </button>
    </form>
@endsection