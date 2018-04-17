<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $table = 'portfolios';

    protected $fillable = [
    	'title', 'description', 'url', 'client', 'client_url', 'image'
    ];

    protected $appends = ['category_id', 'url'];

    public function category()
    {
    	return $this->belongsToMany('App\Category', 'resources_categories', 'resource_id')->withTimestamps();
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'resources_tags', 'resource_id')->withTimestamps();
    }

    public function thumb()
    {
        return $this->belongsTo('App\Media', 'image');
    }

    public function image()
    {
        return $this->belongsTo('App\Media', 'image');
    }

    public function media(){
    	return $this->belongsToMany('App\Media', 'portfolio_media')->withTimestamps();
    }

    public function getCategoryIdAttribute()
    {
        return $this->category->pluck('id');
    }

    public function getUrlAttribute()
    {
        return url('dashboard/portfolio') . '/' . $this->id;
    }
}