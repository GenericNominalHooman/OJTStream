<?php

namespace App\Http\Livewire\Kupli;

use App\Models\Penguguman as ModelsPenguguman;
use Livewire\Component;

class Penguguman extends Component
{
    public $penguguman_all;
    
    public function render()
    {
        return view('livewire.kupli.penguguman', [
            "penguguman_all" => $this->penguguman_all,
        ]);
    }

    public function mount(){
        $this->penguguman_all = ModelsPenguguman::get();
    }
}
