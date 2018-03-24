<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Resource;
use Intervention\Image\Facades\Image as Intervention;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
	private $photos_path;
    private $thumbnail_path;

    public function __construct(Image $media)
    {
    	$this->middleware('auth');
    	$this->photos_path = public_path('/storage');
        $this->thumbnail_path = public_path('/storage/thumbnail');
    	$this->media = $media;
    }

    public function upload(Request $request)
    {
    	$photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }

        if (!is_dir($this->thumbnail_path)) {
            mkdir($this->thumbnail_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $thumbnail = 250;
            $medium = 500;
            $large = 1000;

            $photo = $photos[$i];

            // Slice file name from the extension
            $slice_name = str_before($photo->getClientOriginalName(), $photo->getClientOriginalExtension());

            // Create original name slug from slice_name
            $original_name = str_slug($slice_name, '-');

            // Create save name from original slug, 6 random string and added original extension
            $save_name = $original_name . '.' . $photo->getClientOriginalExtension();

            $image = Intervention::make($photo);

            Intervention::make($photo)
                ->resize($thumbnail, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($this->thumbnail_path . '/' . $save_name, 70);

            // Move to the directory
            $photo->move($this->photos_path, $save_name);

            $upload = new $this->media;
            $upload->file = $save_name;
            $upload->title = $original_name;
            $upload->save();
        }
    }

    public function mediaIndex()
    {
        $images = $this->media->orderBy('created_at', 'desc')->get();
 
        return Resource::collection($images);
    }

    public function mediaPut(Request $request)
    {
        $image = $this->media->findOrFail($request->id);

        $image->id = $request['id'];
        $image->title = $request['title'];
        $image->caption = $request['caption'];
        $image->alt = $request['alt'];
        $image->description = $request['description'];

        if($image->save()){
            return new Resource($image);
        }
    }

    public function mediaDelete($id)
    {
        $image = $this->media->findOrFail($id);

        $file_path = $this->photos_path . '/' . $image->file;
        $thumbnail_path = $this->thumbnail_path . '/' . $image->file;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($thumbnail_path)) {
            unlink($thumbnail_path);
        }

        $image->delete();
    }
}
