<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layouts extends Component
{
    public $title;
    public $auth;
    /**
     * Create a new component instance.
     */
    public function __construct($title = 'Terpercaya Dalam Bidangnya | Portal No 1 DiIndonesia', $auth = false)
    {
        $this->title = $title;
        $this->auth = $auth;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
