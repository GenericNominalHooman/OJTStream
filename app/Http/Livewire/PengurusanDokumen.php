<?php

namespace App\Http\Livewire;

use App\Models\DokumenOJT;
use Livewire\Component;

class PengurusanDokumen extends Component
{
    public function render()
    {
        $dokumen_ojts = DokumenOJT::orderBy("document_name", "ASC")->paginate(5);
        return view('livewire.pengurusan-dokumen', [
            "dokumen_ojts" => $dokumen_ojts,
        ]);
    }
}
