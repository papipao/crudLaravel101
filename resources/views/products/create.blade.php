@extends('layouts.layout')
@section('content')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" style="max-width: 560px; margin: 0 auto;">
        @csrf
        <h3 class="text-center my-3">Add Product</h3>
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
            <div class="col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Title" class="form-control">
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <input type="text" name="price" value="{{ old('price') }}" placeholder="Price" class="form-control">
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
               <select name="category_id" class="form-select">  
                   @foreach ($categories as $categoryVal)
                       <option value="{{ $categoryVal->id }}">{{ $categoryVal->name }}</option>
                   @endforeach                                
               </select>
            </div>
             <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit </button>
    </form>
@endsection