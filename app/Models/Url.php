<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['destination','slug'];

    public function getShortenedUrlAttribute()
    {
        $shortUrl = env('APP_URL')."/api?s=". $this->attributes['slug'];
        return $this->attributes['shortenedUrl'] = $shortUrl;
    }
    protected $appends = ['shortened_url'];
}
