<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutUsFeature extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'bg_color',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')
            ->useDisk('product_images');
    }
}
