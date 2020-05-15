<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'description', 'is_ongoing'];

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

    public function articles ()
    {
        return $this->hasMany(Article::class, 'category_article_id', 'id');
    }

    public function galleries ()
    {
        return $this->hasMany(Gallery::class, 'category_article_id', 'id');
    }
}
