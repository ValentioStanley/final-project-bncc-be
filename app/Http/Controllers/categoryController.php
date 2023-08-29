<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function addCategory(){

        return view('addCategory');
    }

    public function storeCategory(Request $request){
        Category::create([
            'namaKategori' => $request->namaKategori,
        ]);
        return redirect(route('addCategory'));
    }

    public function showCategory(){
        $categories = Category::all();
        // dd($categories);
        return view('showCategory')->with('categories', $categories);
    }

    public function categoryDetail($id){
        $categoryDet = Category::findOrFail($id);
        return view('categoryDetail')->with('categoryDet', $categoryDet);
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('updateCategory')->with('category', $category);
    }

    public function updateCategory($id, Request $request){
        $category = Category::findOrFail($id)->update([
            "namaKategori" =>$request->namaKategori,
        ]);
        return redirect(route('showCategory'));
    }

    public function deleteCategory($id){
        Category::destroy($id);

        return redirect(route('showCategory'));
    }
}
