<?php

namespace Database\Seeders;

use App\Models\ReviewImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/273598001_658200738761209_6266561834994200363_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=101&_nc_ohc=b-jk-J9vimQAX-3NfGH&tn=196qGzV16yENArIc&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjc3MDg0NTY1MjA5NDA1NzQyMQ%3D%3D.2-ccb7-5&oh=00_AT8cgJMNgtLIYH5nmWfOgmne1Ym1Cdsgx00R_6cFldFMAg&oe=63301134&_nc_sid=30a2ef",
                "poster" => "",
                "type" => "image",
                "permalink" => "https://www.instagram.com/p/CZ0BXFpAGYz/"
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/274176709_1095519654359308_7662157377446499351_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=104&_nc_ohc=YxoMrmFTeBoAX_-9pyy&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjc3Njg5Njk4NDI1MTUwNzYzNA%3D%3D.2-ccb7-5&oh=00_AT85nWREg2GG1rj8OJLabPCDaBSadaMDVt5CTqXdrkd0Ug&oe=63305EDD&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CaJhRouqy_8/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/274481143_999811190746108_5129671534338477143_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=104&_nc_ohc=emq8GJWwlgUAX8G9-SV&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjc3ODc4Njk0MTEzNzc5NjY0OQ%3D%3D.2-ccb7-5&oh=00_AT8q7zkTehxw1Ni1sFLWTC_L0jsGPNly9FP6rWlrrBs72g&oe=632F3944&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CaQPADVgRuy/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/274728527_1122959988467198_5293864602244299248_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=Kewv4Y5mvk0AX9lrL_G&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjc4MjQwMTkwMjE2NjUwMTY5MQ%3D%3D.2-ccb7-5&oh=00_AT_1TI3fm-o5iPoXdpZ8xVy8wiUfrLwqGAHXR6DIPJU7SQ&oe=63306818&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CadE8rTAtSE/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/289159942_599664898031299_3596014106164109492_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=107&_nc_ohc=8ShEZ4VmrrMAX-3o7Y0&tn=196qGzV16yENArIc&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg2NjA3MTU0NzEyMTIzMjQyNA%3D%3D.2-ccb7-5&oh=00_AT8o-WZJInGaJYXrWsyWGeP8j9EGVAKTqD_rBDPgZrj4Lw&oe=63306615&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CfGVOP0gft4/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/291768375_2238615592968465_3828145036538517873_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=109&_nc_ohc=rtkQGV-fFkMAX_1KVtM&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg3MzU3MzA4NjgyMjIyMDgwNg%3D%3D.2-ccb7-5&oh=00_AT9Z52r16s3osRGgBXIfm-e_-PPsSDy4zZlQlt89QFA4HA&oe=632F33ED&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/Cfg-4EUqB7_/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t50.2886-16/293428946_452126349786164_2644195104814897913_n.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjcyMC5jYXJvdXNlbF9pdGVtLmJhc2VsaW5lIiwicWVfZ3JvdXBzIjoiW1wiaWdfd2ViX2RlbGl2ZXJ5X3Z0c19vdGZcIl0ifQ&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=QBg3IsnHGecAX_YfM0L&edm=ALQROFkBAAAA&vs=583160083453888_1418452350&_nc_vs=HBksFQAYJEdOSmVmUkUwLUhqZU5Kc0JBUG1hVVROd0ViSWtia1lMQUFBRhUAAsgBABUAGCRHTUhQZ2hGR2xtRmVDRzBBQUw1WXFUNE50aEFyYmtZTEFBQUYVAgLIAQAoABgAGwGIB3VzZV9vaWwBMBUAACaqxtWTrPCFQRUCKAJDMywXQEOEOVgQYk4YEmRhc2hfYmFzZWxpbmVfMV92MREAde4HAA%3D%3D&_nc_rid=6f7db0272b&ccb=7-5&oe=632AF583&oh=00_AT9USBVWTYHZam9hHuXjaK4TXgDi1dAwB7QRNDokFyWgFw&_nc_sid=30a2ef",
                "poster" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/293029469_990428171631627_242300853588384083_n.jpg?stp=dst-jpg_e15_s640x640&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=103&_nc_ohc=craFAgOwwOwAX8fNFFq&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg4MjQ1OTQ0MzQwNTY5NjUyMQ%3D%3D.2-ccb7-5&oh=00_AT9MQP0imh0aKpYlcvIQn6v2CbABM079uimIUNm0lTVq-A&oe=632F463B&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CgAjcttK56W/",
                "type" => "video"
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t50.2886-16/291050129_1490683864694477_5253851409154690181_n.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjQ4MC5jYXJvdXNlbF9pdGVtLmJhc2VsaW5lIiwicWVfZ3JvdXBzIjoiW1wiaWdfd2ViX2RlbGl2ZXJ5X3Z0c19vdGZcIl0ifQ&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=105&_nc_ohc=zf7erb4ybekAX8WFfkx&edm=ALQROFkBAAAA&vs=600866094583969_2919058267&_nc_vs=HBksFQAYJEdKRVNXUkhOUGpyaXhFc0ZBSVhNV1VFRmJ1bElia1lMQUFBRhUAAsgBABUAGCRHSm9BUmhFNDRUcDNnUXdDQUw3SllSMWYyTWhQYmtZTEFBQUYVAgLIAQAoABgAGwGIB3VzZV9vaWwBMBUAACb29bvZwOLcPxUCKAJDMywXQDFVP3ztkWgYEmRhc2hfYmFzZWxpbmVfMV92MREAde4HAA%3D%3D&_nc_rid=d7cc1b47e7&ccb=7-5&oe=632B1E44&oh=00_AT_VRWICvCHIz0ME2JVOZ3QRAK3padCmKrhnuPfqCz2YVw&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CfV4Bb5gLWG/",
                "poster" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/290570176_137740881948777_4481096411301286740_n.jpg?stp=dst-jpg_e15&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=109&_nc_ohc=4a6F1P4bO88AX-yKMxO&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg3MDQ0NjA5MjM4NDg2MDUyNg%3D%3D.2-ccb7-5&oh=00_AT-1bGMybLoju1D11pFi0e_-cCv4gbepKYJXyJAISISNwg&oe=63301ECE&_nc_sid=30a2ef",
                "type" => "video"
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/295488546_611266437313143_255035245098183594_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=103&_nc_ohc=QYg8mFCn2lAAX-HvKqG&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg4OTQ3ODI3MTk4OTkwODIyOA%3D%3D.2-ccb7-5&oh=00_AT-w2mMeXFNp4_eQTi7ng5yDnCH6ksPMXy37Hv_MQGbBZA&oe=632FD0EE&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CgZfTC1qe-z/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/296721367_2933793723580182_4365665220147595311_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=106&_nc_ohc=MfjV4GdsjgAAX8EZho_&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=Mjg5NjI0NjMzMDY2MjQwODkzOQ%3D%3D.2-ccb7-5&oh=00_AT9Xq232e05T24E2nlgIsTemiQz0XusCu9y44H6M3BdHAw&oe=632F757E&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CgxiLOkqkw7/",
                "poster" => "",
                "type" => "image",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t50.2886-16/299459621_2984463588519079_6937872156838758290_n.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjcyMC5jYXJvdXNlbF9pdGVtLmJhc2VsaW5lIiwicWVfZ3JvdXBzIjoiW1wiaWdfd2ViX2RlbGl2ZXJ5X3Z0c19vdGZcIl0ifQ&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=107&_nc_ohc=n82CWHJlWL0AX-ESC26&edm=ALQROFkBAAAA&vs=1027328017975083_3560209391&_nc_vs=HBksFQAYJEdDVmsyUkduN0FtVVdwb0tBSktIY3QzM1JVaGdia1lMQUFBRhUAAsgBABUAGCRHSzJSMUJHV3Y1dFRydk1EQUM0V2R5OFk3WVZ5YmtZTEFBQUYVAgLIAQAoABgAGwGIB3VzZV9vaWwBMBUAACbChoWg%2B624QBUCKAJDMywXQDWIcrAgxJwYEmRhc2hfYmFzZWxpbmVfMV92MREAde4HAA%3D%3D&_nc_rid=f09c79ed5f&ccb=7-5&oe=632B6303&oh=00_AT_eFDH5jy7mQmLTgjRBSc5fM49a6Bk9e5qqe2cz60CldA&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/ChLII3hr7ma/",
                "poster" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/299161428_625891738881725_7188322982493228037_n.jpg?stp=dst-jpg_e15_s640x640&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=105&_nc_ohc=a0225gdA_tcAX_jtUCG&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkwMzQ0OTg4NTU3MjIwODYyMQ%3D%3D.2-ccb7-5&oh=00_AT-aifyXrBeg3HE8yBpEGW9bu2rWH7bwe2XLMbIFuW9qyQ&oe=632F3F07&_nc_sid=30a2ef",
                "type" => "video"
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/301981698_488931662706374_7027195340200523929_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=hyj0WmBAOGAAX9jYM_e&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkxNjQ5MjY0MTA4MDk4MzAzOQ%3D%3D.2-ccb7-5&oh=00_AT-1r2TSMXrcv1MlmdEo82h8BkG0fuMCEfOPj_M5phU0hg&oe=632F7810&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/Ch5dpw0LT5M/",
                "type" => "image",
                "poster" => "",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/305499577_5157840744339429_952237164560737637_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=109&_nc_ohc=ATL7pQCOX5IAX-qKpe2&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkyMDc2MDY5NTk1MjQ2NTM5MA%3D%3D.2-ccb7-5&oh=00_AT9RTAbUFZHXqaf1NtXqJh64ksdCYCTGyZnfkq98be2Mag&oe=632FC6A9&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CiIoGNOqa8T/",
                "type" => "image",
                "poster" => "",
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/306393736_1483975515451654_8487651437367048129_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=110&_nc_ohc=kFusAUAqpOkAX8sUgkM&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkyNjMwOTUyMDA0MzAxNDcyMQ%3D%3D.2-ccb7-5&oh=00_AT83Qm3dhqDt5swoUXLpa-UMytVpN6lgmEGWGxGAJY856w&oe=632EDE5C&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CicVwI1gqji/",
                "type" => "image",
                "poster" => "",
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/306815174_492595928987136_6325537172976332849_n.jpg?stp=dst-jpg_e35_s640x640_sh0.08&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=100&_nc_ohc=pQ5HYJHkyhYAX-4ut0h&edm=APU89FABAAAA&ccb=7-5&oh=00_AT8xuVaXLuRrJTiyUPyoILvUL6-JgERGL9BSL_6UA0LcYw&oe=632ED7F2&_nc_sid=86f79a",
                "permalink" => "https://www.instagram.com/p/CigBjbMrWSg/",
                "type" => "image",
                "poster" => "",
            ],
            [
                "url" => "https://instagram.fabb1-2.fna.fbcdn.net/v/t51.2885-15/306949683_630562171789140_2095519183219132233_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-2.fna.fbcdn.net&_nc_cat=100&_nc_ohc=-lfOcvd7X1IAX-lS9ol&tn=196qGzV16yENArIc&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkyODc3Njg4OTk1NTY2MTIyOQ%3D%3D.2-ccb7-5&oh=00_AT8Kv3_nXUcbJz-_yIO3_1Mf8rBrCmybJtDuVFWHcDtSQg&oe=63302DA9&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CilGxGWLf3h/",
                "type" => "image",
                "poster" => "",
            ],
            [
                "url" => "https://instagram.fabb1-1.fna.fbcdn.net/v/t51.2885-15/307530622_397701529183195_151997607711053704_n.jpg?stp=dst-jpg_e35&_nc_ht=instagram.fabb1-1.fna.fbcdn.net&_nc_cat=107&_nc_ohc=VTvxuYdeAIQAX8q63mi&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MjkzMDgzMzczNzgxNDQ5NzMyMQ%3D%3D.2-ccb7-5&oh=00_AT-wjjNp9tfWj1JsPzEVFMx2Pm5bAPwLRtjHpKO6U13TRA&oe=633045E7&_nc_sid=30a2ef",
                "permalink" => "https://www.instagram.com/p/CisacOdqjde/",
                "type" => "image",
                "poster" => "",
            ],
        ];

        ReviewImage::insert($images);
    }
}
