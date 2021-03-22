<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $primaryKey = 'id';

    protected $fillable = ['image', 'title', 'tags'];

    public static function filterImage( ?string $tag, string $key):object {

        $query = Image::query();

        if ($tag) {
            $tags = explode(';', $tag);
            foreach ($tags as $val){
                $query->orWhere('tags', 'like', "%$val%");
            }
            $query->orderBy('created_at', 'desc');
            $images = $query->paginate(6)->setPath(route('gallery').'?'.$key .'='.$tag);
        }
        else{
            $images = $query->orderBy('created_at', 'desc')->paginate(6);
        }

        return $images;
    }
}
