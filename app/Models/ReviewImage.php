<?php

namespace App\Models;

use App;
use Dymantic\InstagramFeed\Instagram;
use Dymantic\InstagramFeed\Profile;
use Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImage extends Model
{
    use HasFactory;

    const SINGLE_MEDIA_FORMAT = "https://graph.instagram.com/%s?fields=%s&access_token=%s";

    protected $guarded = [];

    protected $casts = ['from_instagram' => 'boolean'];

    public function getIsImageAttribute()
    {
        return $this->type == "image";
    }

    public function getIsVideoAttribute()
    {
        return $this->type == "video";
    }

    public function refreshUrl()
    {
        if(!$this->from_instagram) return;

        $profile = Profile::for('marvinsworld');

        $url = sprintf(
            self::SINGLE_MEDIA_FORMAT,
            $this->instagram_id,
            'id,media_type,media_url,permalink',
            $profile->latestToken()->access_code
        );

        $result = Http::get($url)->object();


        $this->update([
            'permalink' => $result->permalink,
            'url' => $result->media_url
        ]);
    }
}
