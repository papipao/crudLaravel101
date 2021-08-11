<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {

        return view('categories.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate(['name' => 'required|min:5']);
        $input = $request->all();
        Category::create($input);
        session()->flash('success', $input['name'] . 'successfully saved!');
        return redirect('/category');
    }

    public function edit($id) {
        $categories = Category::all();
        $categories = Category::findOrFail($id);
        return view('categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $categories = Category::findOrFail($id);
        $categories->name = $input['name'];
        $categories->save();
        session()->flash('success', $input['name'] . 'succesfully updated!');
        return redirect('/category');
    }

    public function delete($id) {
        $categories = Category::findOrFail($id);
        $categories->delete();
        session()->flash('delete', $categories['name'] . 'deleted!');
        return redirect('/category');
    }

    public function search() {
        $searchText = $_GET['query'];
        $categories = Category::where('name', 'LIKE', '%' . $searchText . '%')->get();
        return view('categories.search', ['categories' => $categories]);
    }

}
