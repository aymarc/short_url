<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public function getSlugAttribute($value)
    {
        $shortUrl = env('APP_URL')."?s=".$value;
        return $this->attributes['shortenedUrl'] == $shortUrl;
    }
}
