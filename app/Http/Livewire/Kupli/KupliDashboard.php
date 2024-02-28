<?php

namespace App\Http\Livewire\Kupli;

use Livewire\Component;

class KupliDashboard extends Component
{
    public $pelajar_ojt_all;
    public $pelajar_all;
    
    public function render()
    {
        return view('livewire.kupli.kupli-dashboard');
    }

    public function mount(){
        
    }
}
