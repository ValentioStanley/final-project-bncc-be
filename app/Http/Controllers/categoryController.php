<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function addCategory(){
        $this->authorize('adminID');
        return view('addCategory');
    }

    public function storeCategory(Request $request){
        $this->authorize('adminID');
        Category::create([
            'namaKategori' => $request->namaKategori,
        ]);
        return redirect(route('addCategory'));
    }

    public function showCategory(){
        $this->authorize('adminID');
        $categories = Category::all();
        // dd($categories);
        return view('showCategory')->with('categories', $categories);
    }

    public function categoryDetail($id){
        $categoryDet = Category::findOrFail($id);
        return view('categoryDetail')->with('categoryDet', $categoryDet);
    }

    public function editCategory($id){
        $this->authorize('adminID');
        $category = Category::findOrFail($id);
        return view('updateCategory')->with('category', $category);
    }

    public function updateCategory($id, Request $request){
        $this->authorize('adminID');
        $category = Category::findOrFail($id)->update([
            "namaKategori" =>$request->namaKategori,
        ]);
        return redirect(route('showCategory'));
    }

    public function deleteCategory($id){
        $this->authorize('adminID');
        Category::destroy($id);

        return redirect(route('showCategory'));
    }
}
