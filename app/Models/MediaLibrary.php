<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaLibrary extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banners_xl')
            ->onlyKeepLatest(3)
            ->withResponsiveImages();
        $this
            ->addMediaCollection('hero_banners_sm')
            ->onlyKeepLatest(2)
            ->withResponsiveImages();
        $this
            ->addMediaCollection('hero_banners_md')
            ->withResponsiveImages();
    }
}
