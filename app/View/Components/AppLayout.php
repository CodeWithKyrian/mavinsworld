<?php

namespace App\View\Components;

use App\Models\ReviewImage;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;

    public function __construct($title) {
        $this->title = $title;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $feeds = ReviewImage::query()->latest()->limit(20)->get();
        return view('layouts.app', compact('feeds'));
    }
}
