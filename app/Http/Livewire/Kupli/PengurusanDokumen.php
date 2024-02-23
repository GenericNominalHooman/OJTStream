<?php

namespace App\Http\Livewire\Kupli;

use App\Models\DokumenOJT;
use Livewire\Component;

class PengurusanDokumen extends Component
{
    public $dokumen_ojts;

    public function mount(){
        $this->dokumen_ojts = DokumenOJT::orderBy("document_name", "asc")->get();
    }

    public function render()
    {
        return view('livewire.kupli.pengurusan-dokumen', [
            "dokumen_ojts" => $this->dokumen_ojts,
        ]);
    }
}
