<?php

namespace App\Http\Livewire\Kupli;

use App\Models\User;
use App\Models\Company;
use App\Models\Pelajar;
use Livewire\Component;
use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use Livewire\WithFileUploads;
use App\Models\PelajarsCompany;
use Illuminate\Support\Facades\Storage;

class TambahPelajar extends Component
{
    use WithFileUploads;
    public User $user;    
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    
    // PELAJAR PROEPRTIES BEGIN
    public $pelajar;
    public $pensyarah_penilai_ojt;
    public $pensyarah_penilai;
    public User $penyelaras_program_user;
    public JanjiTemu $janji_temu_1;
    public JanjiTemu $janji_temu_2;
    public PelajarsCompany $pelajars_company;
    public Company $company;
    public SkopKerja $skop_kerja;
    public $skop_kerja_input;

    public function render()
    {
        return view('livewire.kupli.tambah-pelajar');
    }

    public function mount()
    {
    }

    // Function for displaying appropiate tabs once clicked
    public function switchTab($tabName){
        $this->activeTab = $tabName;
    }

    public function downloadSkopKerja(){
        if(Storage::disk("local")->exists($this->skop_kerja->document_path)){
            return Storage::disk("local")->download($this->skop_kerja->document_path, $this->skop_kerja->document_name);
        }else{
            return redirect()->response("No file found", 404);
        }
    }
}
