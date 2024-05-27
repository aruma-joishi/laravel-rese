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
        $areas = Shop::groupBy('area')->get(['area']);
        $genres = Shop::groupBy('genre')->get(['genre']);

        return view('index', compact("shops","favorites","areas","genres"));
    }

    public function search(Request $request)
    {
        $shops = Shop::with(['user'])->keywordSearch($request->keyword)->genreSearch($request->genre)->areaSearch($request->area)->get();
        $favorites = Favorite::all();
        $areas = Shop::groupBy('area')->get(['area']);
        $genres = Shop::groupBy('genre')->get(['genre']);

        return view('index', compact("shops", "favorites", "areas", "genres"));

    }

    public function detail(Request $request)
    {
        $adjustShop = Shop::where('id', $request->num)->first();
        return view('detail', compact("adjustShop"));
    }

    public function mypage(Request $request)
    {
        $id = Auth::id();
        $favorites = Favorite::where('user_id',$id)->orderBy('shop_id', 'asc')->get(['shop_id']);
        $adjustShops = array();
        foreach ($favorites as &$favorite) {
            $adjustShop = Shop::where('id', $favorite->shop_id)->first();
            array_push($adjustShops, $adjustShop);
        }


        $reservations = Reservation::where('user_id', $id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        $shops = Shop::all();

        return view('mypage',compact("adjustShops","reservations","shops"));
    }

    public function reserve(ReserveRequest $request)
    {
        $reserve = $request->only(['user_id','shop_id','date', 'time', 'number']);
        Reservation::create($reserve);
            return view('done');
        }


    public function destroy(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect('/mypage')->with('message', '予約を削除しました');
    }
}
