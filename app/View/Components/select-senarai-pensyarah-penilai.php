<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select-senarai-pensyarah-penilai extends Component
{
    /**
     * Create a new component instance.
     */
    public $pensyarah_penilai_all;
    public $pensyarah_penilai_input;

    public function __construct($pensyarah_penilai_all, $pensyarah_penilai_input)
    {
        $this->pensyarah_penilai_all = $pensyarah_penilai_all;
        $this->pensyarah_penilai_input = $pensyarah_penilai_input;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-senarai-pensyarah-penilai');
    }
}
