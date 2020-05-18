<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = ['title', 'author', 'keyword', 'short_description', 'description', 'fb_pixel', 'google_analytic', 'icon', 'logo', 'logo_grayscale', 'bg_banner'];
    public function showIcon()
    {
        if (Storage::exists($this->icon)) {
            return "storage/$this->icon";
        }
        return asset('img/default.png');
    }

    public function showLogo()
    {
        if (Storage::exists($this->logo)) {
            return "storage/$this->logo";
        }
        return asset('img/default.png');
    }

    public function showLogoGrayscale()
    {
        if (Storage::exists($this->logo_grayscale)) {
            return "storage/$this->logo_grayscale";
        }
        return asset('img/default.png');
    }

    public function showBgBanner()
    {
        if (Storage::exists($this->bg_banner)) {
            return "storage/$this->bg_banner";
        }
        return asset('img/default.png');
    }
}
