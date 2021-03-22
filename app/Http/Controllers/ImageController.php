<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use IImage;

class ImageController extends Controller
{

    public function gallery(Request $request)
    {
        $images = Image::filterImage($request->get('tag'), 'tag');
        $allTags = Image::select('tags')->get();
        $selectedTags = explode(';', $request->get('tag'));

        return view('gallery', [
            'images' => $images,
            'tags' => get_tags($allTags),
            'selectedTags' => $selectedTags
            ]);
    }
    public function uploadImage(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'tag' => 'required',
        ]);

        $file = $request->file('qqfile');

        $filename = time() .'-'. $file->getClientOriginalName();

        $image = new Image;
        $image->image = $filename;
        $image->title = $request->title;
        $image->tags = $request->tag;
        $image->save();

        $file->move(public_path('storage'), $filename);

        ini_set('memory_limit','256M');
        IImage::make(public_path('storage/'. $filename))->resize(350, 235)->save();

        $response['success'] = true;
        return json_encode($response);
    }
}
