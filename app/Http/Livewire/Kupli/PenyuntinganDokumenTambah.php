<?php

namespace App\Http\Livewire\Kupli;

use Livewire\Component;
use App\Models\DokumenOJT;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PenyuntinganDokumenTambah extends Component
{
    use WithFileUploads;

    public $kupli;
    public $dokumen_ojt_input_name;
    public $dokumen_ojt_input_description;
    public $dokumen_ojt_input_type;
    public $dokumen_ojt_input_path;
    public $dokumen_ojt_input_file;
    public $dokumen_ojt_input_extension;
    public $dokumen_ojt_dir = "KVOJT";
    
    public function rules(){
        return [
            "dokumen_ojt_input_name" => "required",
            "dokumen_ojt_input_description" => "required",
            "dokumen_ojt_input_type" => "required|in:infomasi,pengisian",
            "dokumen_ojt_input_file" => "required|file|mimes:pdf",
        ];
    }

    public function render()
    {
        return view('livewire.kupli.penyuntingan-dokumen-tambah');
    }

    public function mount(){
        $this->kupli = auth()->user()->Kupli;
    }

    public function add(){
        $this->validate();
        $this->dokumen_ojt_input_extension = $this->dokumen_ojt_input_file->getClientOriginalExtension();

        // ADD FILE EXTENSION TO DOKUMEN OJT
        $this->dokumen_ojt_input_name = $this->dokumen_ojt_input_name.".".$this->dokumen_ojt_input_extension;

        // UPDATE DOCUMENT PATH
        $this->dokumen_ojt_input_path = $this->dokumen_ojt_input_file->storeAs($this->dokumen_ojt_dir, $this->dokumen_ojt_input_name, "public");

        // SAVE INTO DB 
        $this->kupli->DokumenOJT()->create([
            "document_name" => $this->dokumen_ojt_input_name,
            "document_path" => $this->dokumen_ojt_input_path,
            "document_type" => $this->dokumen_ojt_input_type,
            "document_description" => $this->dokumen_ojt_input_description,
        ]);

        // FLASH MESSAGE
        return redirect()->route("kupli pengurusan dokumen")->with("status", "Successfully added {$this->dokumen_ojt_input_name}");
    }
}
