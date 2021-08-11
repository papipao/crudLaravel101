<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::with('category')->paginate(5);
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'price' => 'required',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $destination = 'public/images/products';
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $imageName);
            $input['image'] = $imageName;
        }
        Product::create($input);
        session()->flash('success', $input['title'] . ' successfully saved!');
        return redirect('/');
    }

    public function edit($id) {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', ['products' => $products, 'categories' => $categories]);
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $products = Product::findOrFail($id);
        $products->title = $input['title'];
        $products->price = $input['price'];
        $products->category_id = $input['category_id'];

        $products->save();
        session()->flash('success', $input['title'] . ' successfully updated!');
        return redirect('/');
    }

    public function delete($id) {

        $products = Product::findOrFail($id);
        $products->delete();
        session()->flash('delete', $products['title'] . ' successfully deleted!');
        return redirect('/');
    }

    public function search() {
        $searchText = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%' . $searchText . '%')->with('category')->get();
        return view('products.search', ['products' => $products]);
    }
}
