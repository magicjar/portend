<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
    	'title', 'content', 'image', 'slug'
    ];

    protected $dates = ['deleted_at'];

    protected $appends = ['category_id', 'url'];

    public function thumbnail()
    {
        return $this->belongsTo('App\Media', 'image');
    }

    public function image()
    {
        return $this->belongsTo('App\Media', 'image');
    }

    public function category()
    {
    	return $this->belongsToMany('App\Category', 'resources_categories', 'resource_id')->withTimestamps();
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'resources_tags', 'resource_id')->withTimestamps();
    }

    public function getCategoryIdAttribute()
    {
        return $this->category->pluck('id');
    }

    public function getUrlAttribute()
    {
        return url('dashboard/article') . '/' . $this->id;
    }
}
