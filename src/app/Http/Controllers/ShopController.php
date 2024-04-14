<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $favorites = Favorite::all();
        return view('index', compact("shops","favorites"));
    }

    public function detail(Request $request)
    {
        $adjustShop = Shop::where('id', $request->num)->first();
        return view('detail', compact("adjustShop"));
    }

    public function mypage(Request $request)
    {
        $id = Auth::id();
        $favorites = Favorite::where('user_id',$id)->get();
        // dd($favorites);
        $shops = Shop::where('shop_id',$favorites->user_id)->get();
        return view('mypage', compact("favorites","shops"));
    }

    //まだ

    public function reservation(Request $request)
    {
        $adjustShop = Shop::where('id', $request->num)->first();
        return view('detail', compact("adjustShop"));
    }
}
