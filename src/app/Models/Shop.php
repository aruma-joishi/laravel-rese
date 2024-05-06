<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area', 'genre', 'content', 'image'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
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

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeGenreSearch($query, $genre)
    {
        if (!empty($genre)) {
            $query->where('genre', $genre);
        }
    }

    // public function scopeAreaSearch($query, $area)
    // {
    //     if (!empty($area)) {
    //         $query->where('area', $area);
    //     }
    // }

}
