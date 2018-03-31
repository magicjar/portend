<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
    	'file', 'title', 'caption', 'alt', 'description'
    ];

    protected $appends = ['image_url', 'thumbnail'];

    public function getImageUrlAttribute()
    {
    	return asset('storage/' . $this->file);
    }

    public function getThumbnailAttribute()
    {
    	return asset('storage/thumbnail/' . $this->file);
    }
}
