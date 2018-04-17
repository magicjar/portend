<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
    	'file', 'media_type', 'title', 'caption', 'alt', 'description'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->media_type === 'image'){
            return asset('storage/' . $this->file);
        } else {
            return $this->file;
        }
    }
}
