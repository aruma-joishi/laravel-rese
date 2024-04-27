<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reservation;
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
        $favorites = Favorite::where('user_id',$id)->get(['shop_id']);
        $adjustShops = array();
        foreach ($favorites as &$favorite) {
            $adjustShop = Shop::where('id', $favorite->shop_id)->first();
            array_push($adjustShops, $adjustShop);
        }

        $reservations = Reservation::where('user_id', $id)->get();
        return view('mypage',compact("favorites","adjustShops","reservations"));
    }

    public function reserve(ReserveRequest $request)
    {
        $reserve = $request->only(['user_id','shop_id','date', 'time', 'number']);
        Reservation::create($reserve);
            return view('thanks');
        }
}
