<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class itemControllerAPI extends Controller
{
    //
    public function index(){
        $item = Order::with('');
    }

}
