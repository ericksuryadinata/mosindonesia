<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $fillable = ['title', 'description', 'url', 'active'];

    public function showImage()
    {
        if (Storage::exists($this->url)) {
            return "storage/$this->url";
        }
        return asset('img/default.png');
    }

    public function showBanner()
    {
        if (Storage::exists($this->url)) {
            return "storage/$this->url";
        }

        return asset('img/default-banner.jpg');
    }
}
