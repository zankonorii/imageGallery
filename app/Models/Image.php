<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Image extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeStatus()
    {
        $temp = $this->likes()->where('user_id', auth()->user()->id)->first();

        if ($temp)
            return true;
        else
            return false;
    }
}
