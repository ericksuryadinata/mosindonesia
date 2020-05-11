<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = ['title', 'description', 'icon', 'active'];

    public function showIcon(){
        return "fa $this->icon";
    }
}
