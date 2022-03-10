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
        
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_three.jpg'))->toMediaCollection('banners_xl');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_two.jpg'))->toMediaCollection('banners_xl');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_four.jpg'))->toMediaCollection('banners_xl');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/banner_xl_five.jpg'))->toMediaCollection('banners_xl');

        $mediaLibrary->addMediaFromUrl(asset('img/banners/new_banner_md_one.jpg'))->toMediaCollection('hero_banners_sm');
        $mediaLibrary->addMediaFromUrl(asset('img/banners/new_banner_md_two.jpg'))->toMediaCollection('hero_banners_sm');

    }
}
