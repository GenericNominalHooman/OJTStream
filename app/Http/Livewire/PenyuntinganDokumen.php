<?php

namespace App\Http\Livewire;

use App\Models\DokumenOJT;
use App\Models\DokumenOJTPelajar;
use Livewire\Component;

class PenyuntinganDokumen extends Component
{
    public DokumenOJTPelajar $dokumenOJTPelajar;
    public DokumenOJT $dokumenOJT;

    public function render()
    {
        return view('livewire.penyuntingan-dokumen');
    }

    public function mount(DokumenOJTPelajar $dokumenOJTPelajar){
        $this->dokumenOJTPelajar = $dokumenOJTPelajar;
        $this->dokumenOJT = $dokumenOJTPelajar->DokumenOJT;
    }
}
