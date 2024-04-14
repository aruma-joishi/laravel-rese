<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id'];

    public function favorite()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function favoriteCheck()
    {
        $id = Auth::id();

        $favorites = array();
        foreach ($this->favorites as $favorite) {
            array_push($favorites, $favorite->user_id);
        }

        if (in_array($id, $favorites)) {
            return true;
        } else {
            return false;
        }
    }
}
