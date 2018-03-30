<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';

    protected $fillable = [
    	'title', 'description', 'url', 'client', 'client_url', 'image'
    ];

    public function category()
    {
    	return $this->belongsToMany('App\Category', 'resources_categories', 'resource_id')->withTimestamps();
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'resources_tags', 'resource_id')->withTimestamps();
    }

    public function image()
    {
        return $this->belongsTo('App\Image', 'image');
    }

    public function media(){
    	return $this->belongsToMany('App/Image', 'portfolio_image');
    }
}