<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Enums\BorderType;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Image\Manipulations;

class Setting extends Model implements TranslatableContract,HasMedia
{
    use Translatable;
   // use HasMedia;
    use HasFactory;use SoftDeletes;
    use InteractsWithMedia;

    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['logo','favicon','facebook','linkedin','phone','email'];


    public function registerMediaCollections():void
     {
         $this->addMediaCollection('logo')->withResponsiveImages();
    }

    public function registerMediaConversions(Media $media = null): void
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
}
