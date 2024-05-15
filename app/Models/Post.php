<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Post extends Model implements TranslatableContract,HasMedia
{
    use Translatable; use HasFactory; use SoftDeletes;
    use InteractsWithMedia;

    
    public $translatedAttributes = ['title', 'content','small_description','tags'];
    protected $fillable = ['image','user_id','category_id'];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);

        $this->addMediaConversion('old-picture')
              ->sepia()
              ->border(10, 'black', Manipulations::BORDER_OVERLAY);
              
        $this->addMediaConversion('thumb-cropped')
            ->crop('crop-center', 400, 400); // Trim or crop the image to the center for specified width and height.
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
