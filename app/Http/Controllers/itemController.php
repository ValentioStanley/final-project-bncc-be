<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

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
        // $validated = $request->validate([

        //     'kategoriID' => 'required',
        //     'kategoriBarang' => 'required',
        //     'namaBarang' => 'required|min:5|max:80',
        //     'hargaBarang' => 'required',
        //     'jumlahBarang'=> 'required|numeric',
        //     'fotoBarang' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        // if ($validated) {
        //     $fotoBarang = $request->file('fotoBarang')->getClientOriginalExtension();
        //     $pathFoto = $fotoBarang->store('fotoBarang', 'public');

        //     Item::create([
        //         'kategoriID' => $request->input('kategoriID'),
        //         'kategoriBarang' => $request->input('kategoriBarang'),
        //         'namaBarang' => $request->input('namaBarang'),
        //         'hargaBarang' => $request->input('hargaBarang'),
        //         'jumlahBarang' => $request->input('jumlahBarang'),
        //         'fotoBarang'=> $pathFoto,
        //     ]);

        //     session()->flash('success','Data Berhasil Ditambahkan');
        //     return redirect('/');
        // }else{
        //     session()->flash('false', 'Tidak ada gambar');
        //     return redirect()->back();
        // }


        $request->validate([
            // 'kategoriID' => 'required', 
            'namaBarang' => 'required|min:5|max:80',
            'hargaBarang' => 'required',
            'jumlahBarang'=> 'required|numeric',
            'fotoBarang' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $requestData = $request->all();
        $extension = $request->file('fotoBarang')->getClientOriginalExtension();
        $filename = $request->namaBarang.'.'.$extension;
        $path = $request->file('fotoBarang')->storeAs('/public/images/', $filename);

        $requestData = [
            'kategoriID' => $request->category,
            'kategoriBarang' => $request->input('kategoriBarang'),
            'namaBarang' => $request->input('namaBarang'),
            'hargaBarang' => $request->input('hargaBarang'),
            'jumlahBarang' => $request->input('jumlahBarang'),
            'fotoBarang'=> $filename,
        ];
        Item::create($requestData);
        session()->flash('success','Data Berhasil Ditambahkan');
        return redirect('/');
    }

    public function itemDetail($id){
        $item = Item::findOrFail($id);
        return view('itemDetail')->with('item', $item);
    }

    public function editItem($id){
        $item = Item::findOrFail($id);
        return view('updateItem')->with('item', $item);
    }

    public function updateItem($id, Request $request){
        $item = Item::findOrFail($id)->update([
            'kategoriID' => $request->kategoriID,
            'namaKategori' => $request->namaKategori,
            'namaBarang' => $request->namaBarang,
            'hargaBarang' => $request->hargaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'fotoBarang' => $request->fotoBarang,
        ]);
        return redirect('/');
    }

    public function deleteItem($id){
        $item = Item::destroy($id);
        return redirect('/');
    }

    public function confirmDelete($id){
        $item = Item::findOrFail($id);

        return view('confirmDelete')->with('item', $item);
    }
}
