<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Desc extends Component
{
    public string $label;
    public string $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $placeholder,
        public string $name,
        string $label = null,
        string $value = null
    ) {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.desc');
    }
}
