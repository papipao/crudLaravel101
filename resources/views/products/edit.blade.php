@extends('layouts.layout')
@section('content')
    <h3 class="text-center my-3">Add Product</h3> 
    <form action="{{ url('/edit-product/' . $products->id) }}" method="post" style="max-width: 560px; margin: 0 auto;">
        @csrf
        @method('PUT')
      
        <div class="row g-2">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="title" value="{{ old('title') ?? $products->title }}" placeholder="Title" class="form-control">          
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <input type="text" name="price" value="{{ old('price') ?? $products->price }}" placeholder="Price" class="form-control">
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
               <select name="category_id" class="form-select">
                   @foreach ($categories as $categoryVal)
                    <option value="{{ $categoryVal->id }}">{{ $categoryVal->name }}</option>
                   @endforeach
               </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
@endsection