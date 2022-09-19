<?php

namespace App\View\Components;

use Dymantic\InstagramFeed\InstagramFeed;
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
        $feeds = InstagramFeed::for('marvinsworld', 30);
        return view('layouts.app', ['feeds' => $feeds]);
    }
}
