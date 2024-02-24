<?php

namespace App\Http\Livewire\Kupli;

use App\Models\Pelajar;
use Livewire\Component;

class SenaraiPelajar extends Component
{
    public $pelajars;
    
    public function render()
    {
        return view('livewire.kupli.senarai-pelajar', [
            "pelajars" => $this->pelajars,
        ]);
    }

    public function mount(){
        $this->pelajars = Pelajar::orderBy("date_started", "asc")->get();
    }
}
