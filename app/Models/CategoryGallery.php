<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'description', 'type'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function scopeImage ($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideo ($query)
    {
        return $query->where('type', 'video');
    }
}
