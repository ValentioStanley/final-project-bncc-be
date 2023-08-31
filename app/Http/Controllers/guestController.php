<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class guestController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('welcome')->with('items', $items);
    }

}
