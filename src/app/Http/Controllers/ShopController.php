<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('index',compact("shops"));
    }

    public function detail(Request $request)
    {
        $adjustShop = Shop::where('id',$request->num)->first();
        return view('detail', compact("adjustShop"));
    }
}
