<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'category_article_id', 'description', 'image', 'sub_category_id'];

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

    public function showImage()
    {
        if (Storage::exists($this->image)) {
            return "storage/$this->image";
        }
        return asset('mos-panel/img/default.png');
    }

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
