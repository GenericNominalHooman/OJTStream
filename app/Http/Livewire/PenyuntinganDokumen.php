<?php

namespace App\Http\Livewire;

use App\Models\DokumenOJT;
use App\Models\DokumenOJTPelajar;
use App\Models\Pelajar;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PenyuntinganDokumen extends Component
{
    use WithFileUploads;

    public DokumenOJTPelajar $dokumenOJTPelajar;
    public DokumenOJT $dokumenOJT;
    public Pelajar $pelajar;
    public $pelajarHasUploadKVOJT;
    public $kvojt_input;
    public $pelajarKVOJTFolder;

    public function rules(){
        return[
            "kvojt_input" => "required|file|mimes:pdf|max:10000",
        ];
    }

    public function render()
    {
        return view('livewire.penyuntingan-dokumen');
    }

    public function mount(DokumenOJTPelajar $dokumenOJTPelajar){
        $this->dokumenOJTPelajar = $dokumenOJTPelajar;
        $this->dokumenOJT = $dokumenOJTPelajar->DokumenOJT;
        $this->pelajarHasUploadKVOJT = $this->dokumenOJTPelajar->document_path == null||"" ? false : true;
        $this->pelajar = auth()->user()->Pelajar;
        $this->pelajarKVOJTFolder = $this->pelajar->getPelajarDirectory()."/KVOJT";
    }

    public function downloadKVOJT(){
        return Storage::disk("public")->download($this->dokumenOJT->document_path, $this->dokumenOJT->document_name);
    }

    public function downloadKVOJTPelajar(){
        return Storage::disk("local")->download($this->dokumenOJTPelajar->document_path, $this->dokumenOJTPelajar->document_name);
    }    

    public function uploadKVOJT(){
        $this->validate();
        $this->dokumenOJTPelajar->document_path = $this->kvojt_input->storeAs($this->pelajarKVOJTFolder, $this->dokumenOJT->document_name, "local");
        $this->dokumenOJTPelajar->document_name = $this->dokumenOJT->document_name;
        $this->dokumenOJTPelajar->save();
        
        session()->flash("status", $this->dokumenOJTPelajar->document_name." has been uploaded successfully");
    }
}
