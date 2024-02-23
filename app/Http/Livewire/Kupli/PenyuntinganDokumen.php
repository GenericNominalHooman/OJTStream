<?php

namespace App\Http\Livewire\Kupli;

use App\Models\DokumenOJT;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PenyuntinganDokumen extends Component
{
    use WithFileUploads;

    public $dokumen_ojt;
    public $dokumen_ojt_input;
    public $dokumen_ojt_extension;
    public $dokumen_ojt_dir = "KVOJT";
    
    public function rules(){
        return [
            "dokumen_ojt.document_name" => "required",
            "dokumen_ojt.document_type" => "required|in:pengisian,infomasi",
            "dokumen_ojt.document_description" => "required",
            "dokumen_ojt_input" => "nullable|file|mimes:pdf",
        ];
    }

    public function render()
    {
        return view('livewire.kupli.penyuntingan-dokumen');
    }

    public function mount(DokumenOJT $dokumen_ojt){
        $this->dokumen_ojt = $dokumen_ojt;
        // REMOVE FILE EXTENSION FOR FILLING UP AND ADDING IT BACK IT BEFORE UPDATING ROW
        $this->dokumen_ojt_extension = pathinfo($dokumen_ojt->document_name, PATHINFO_EXTENSION);
        $this->dokumen_ojt->document_name = pathinfo($dokumen_ojt->document_name, PATHINFO_FILENAME);
    }

    public function downloadKVOJT(){
        return Storage::disk("public")->download($this->dokumen_ojt->document_path, $this->dokumen_ojt->document_name);
    }

    public function update(){
        $this->validate();

        if($this->dokumen_ojt_input != null){ // USER UPDATE FILE
            // UPDATE DOCUMENT PATH
            $this->dokumen_ojt->document_path = $this->dokumen_ojt_input->storeAs($this->dokumen_ojt_dir, $this->dokumen_ojt->document_name, "public");
        }

        // RE-ADD EXTENSION
        $this->dokumen_ojt->document_name = $this->dokumen_ojt->document_name.".".$this->dokumen_ojt_extension;

        // SAVE INTO DB 
        $this->dokumen_ojt->save();

        // FLASH MESSAGE
        return redirect()->route("kupli pengurusan dokumen")->with("status", "Successfully updated {$this->dokumen_ojt->document_name}");
    }
}
