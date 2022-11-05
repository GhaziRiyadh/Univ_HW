<?php

namespace App\View\Components\Web;

use App\Models\Meal;
use Illuminate\View\Component;

class MenuCard extends Component
{

    public function __construct(public $image, public $title, public $desc, public $id)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.menu-card');
    }
}
