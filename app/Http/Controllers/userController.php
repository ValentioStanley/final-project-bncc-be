<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function user(){
        $items= Item::all();
        return view('welcomeUser')->with('items', $items);

    }

    public function checkoutUser(){
        // $cart = Item::findOrFail($id);
        // return view('checkoutUser')->with('cart', $cart);
        return view('checkoutUser');
    }
}
