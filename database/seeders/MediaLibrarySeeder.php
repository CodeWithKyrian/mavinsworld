<?php

namespace Database\Seeders;

use App\Models\MediaLibrary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mediaLibrary = MediaLibrary::firstOrCreate([]);
        
        $mediaLibrary->addMediaFromUrl(asset('img/banner-two.png'))->toMediaCollection('banners_xl');

        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_one.jpeg'))->toMediaCollection('banners_xl');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_two.jpeg'))->toMediaCollection('banners_xl');

        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_md_one.jpeg'))->toMediaCollection('hero_banners_sm');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_md_three.jpeg'))->toMediaCollection('hero_banners_sm');

        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_lands_one.jpeg'))->toMediaCollection('hero_banners_md');
        
    }
}
