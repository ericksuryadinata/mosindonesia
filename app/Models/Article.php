<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'category_article_id', 'description', 'image', 'headline'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function niceDescription($length)
    {
        return Str::limit($this->description, $length);
    }

    public function showImage()
    {
        if (Storage::exists($this->image)) {
            return "storage/$this->image";
        }
        return asset('img/default-article.jpg');
    }

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}
