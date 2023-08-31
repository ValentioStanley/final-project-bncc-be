<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class itemController extends Controller
{
    //
    public function allItem(){
        $items = Item::all();
        return view('welcomeAdmin')->with('items', $items);
    }

    public function addItem(){
        $categories = Category::all();
        return view('addItem')->with('categories', $categories);
    }

    public function storeItem(Request $request){
        $request->validate([
            'kategoriID' => 'required',
            'namaBarang' => 'required|min:5|max:80',
            'hargaBarang' => 'required',
            'jumlahBarang'=> 'required|numeric',
            'fotoBarang' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $extension = $request->file('fotoBarang')->getClientOriginalExtension();
        $filename = $request->namaBarang.'.'.$extension;
        $path = $request->file('fotoBarang')->storeAs('/public/images/', $filename);

        $requestData = [
            'kategoriID' => $request->kategoriID,
            'namaBarang' => $request->input('namaBarang'),
            'hargaBarang' => $request->input('hargaBarang'),
            'jumlahBarang' => $request->input('jumlahBarang'),
            'fotoBarang'=> $filename,
        ];
        Item::create($requestData);
        return redirect(route('welcomeAdmin'));
    }

    public function itemDetail($id){
        $item = Item::findOrFail($id);
        return view('itemDetail')->with('item', $item);
    }

    public function editItem($id){
        $categories = Category::all();
        $item = Item::findOrFail($id);
        return view('updateItem')->with('item', $item)->with('categories', $categories);
    }

    public function updateItem($id, Request $request){

        $extension = $request->file('fotoBarang')->getClientOriginalExtension();
        $filename = $request->namaBarang.'.'.$extension;
        $path = $request->file('fotoBarang')->storeAs('/public/images/', $filename);

        $item = Item::findOrFail($id)->update([
            'kategoriID' => $request->kategoriID,
            'namaKategori' => $request->namaKategori,
            'namaBarang' => $request->namaBarang,
            'hargaBarang' => $request->hargaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'fotoBarang' => $filename,
        ]);
        return redirect()->route('welcomeAdmin');
    }

    public function deleteItem($id){
        $item = Item::destroy($id);
        return redirect(route('welcomeAdmin'));
    }

    public function confirmDelete($id){
        $item = Item::findOrFail($id);

        return view('confirmDelete')->with('item', $item);
    }
}
