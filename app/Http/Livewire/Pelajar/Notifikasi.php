<?php

namespace App\Http\Livewire\Pelajar;

use App\Models\Penguguman;
use Livewire\Component;

class Notifikasi extends Component
{
    public $penguguman_all;
    
    public function render()
    {
        return view('livewire.pelajar.notifikasi');
    }

    public function mount(){
        $this->penguguman_all = Penguguman::get();
    }
}
