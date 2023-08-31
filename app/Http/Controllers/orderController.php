<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;

class orderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder($id, Request $request)
    {
        //
        $items = Item::all();
        $orders = Order::all();
        $item = Item::findOrFail($id);
        $categoryDet = Category::findOrFail($id);
        $user = User::findOrFail($id);

        if($item->jumlahBarang == 0){
            session()->flash('error', 'Barang sudah habis, silahkan tunggu hingga barang di-restock ulang');
            return redirect()->back();

        }else{
            $order = new Order();
            $order->subHarga = $item->hargaBarang;
            $order->kuantitas = $request->kuantitas;
            $order->totalHarga = $order->kuantitas * $order->subHarga;

            $lastInvoice = Order::max('nomorInvoice');
            $increment = intval(substr($lastInvoice, 3)) + $item->id;
            $newInvoiceNumber = 'INV' . str_pad($increment, 3, '0', STR_PAD_LEFT);
            $order->nomorInvoice = $newInvoiceNumber;
            return view('checkoutUser')->with('order', $order)->with('item', $item)->with('user', $user)->with('categoryDet', $categoryDet);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder($id, Request $request)
    {
        //
        $request->validate([
            'alamatPengiriman' => 'required|min:10|max:100',
            'kodePos' => 'required|numeric|digits:5'
        ]);
        $item = Item::findOrFail($id);
        $user = User::findOrFail($id);

        $order = new Order();

        $lastInvoice = Order::max('nomorInvoice');
        $increment = intval(substr($lastInvoice, 3)) + $item->id;
        $newInvoiceNumber = 'INV' . str_pad($increment, 3, '0', STR_PAD_LEFT);
        $order->nomorInvoice = $newInvoiceNumber;

        $order->subHarga = $item->hargaBarang;
        $kuantitas = $request->input('kuantitas');
        $totalHarga = $kuantitas * $order->subHarga;

        $requestData = [
            'userID' => $user->id,
            'itemID' => $item->id,
            'nomorInvoice' => $order->nomorInvoice,
            'namaBarang' => $item->namaBarang,
            'kuantitas' => $request->input('kuantitas'),
            'alamatPengiriman' => $request->input('alamatPengiriman'),
            'kodePos' => $request->input('kodePos'),
            'subHarga' => $order->subHarga,
            'totalHarga' => $totalHarga,
        ];

        Order::create($requestData);
        session()->flash('success','Data Berhasil Ditambahkan');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder()
    {
        // tidak ada showorder di blade karena tidak ada req nya di project
        $orders = Order::all();
        return view('showOrder')->with('orders', $orders);
    }
}
