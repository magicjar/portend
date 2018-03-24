<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
    	'name', 'slug', 'description', 'type'
    ];

    public function article()
    {
    	return $this->belongsToMany('App\Article', 'resources_categories', 'resource_id');
    }
}
