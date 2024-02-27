<?php

namespace App\Http\Livewire\Kupli;

use Illuminate\Support\Facades\Hash;
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
    public Pelajar $pelajar;
    public User $pelajar_user;
    public $pelajar_default_password = "password";
    
    // DOKUMEN OJT
    public $dokumen_ojt_pelajar_model_array = [];
    public $dokumen_ojt_all;

    // 
    // LIVEWIRE FUNCTIONS
    // 
    public function rules(){
        return [
        // PELAJAR BIODATA VALUES
        'pelajar_user.email' => 'required|email|unique:users,email',
        'pelajar_user.name' => 'required',
        'pelajar.matrix_number'=> 'required|unique:pelajars,matrix_number',
        'pelajar.semester'=> 'required',
        'pelajar.cohort'=> 'required',
        'pelajar.nric_number' => 'required',
        'pelajar.guardian' => 'required',
        'pelajar_user.phone' => 'required|max:10',
        'pelajar.guardian_telephone_number' => 'required',
        'pelajar.linkedin_url' => 'nullable|url',
        'pelajar.facebook_url' => 'nullable|url',
        'pelajar.github_url' => 'nullable|url',
        'pelajar.program'=> 'required',
        'pelajar_user.gender' => 'required',
        'pelajar.study_type'=> 'required',
        'pelajar_user.location' => 'required',
        'pelajar.heart_disease'=> 'nullable',
        'pelajar.asthma'=> 'nullable',
        'pelajar.diabetes'=> 'nullable',
        'pelajar.osteoporosis'=> 'nullable',
        'pelajar.slipped_disc'=> 'nullable',
        ];
    }
    
    public function render()
    {
        return view('livewire.kupli.tambah-pelajar');
    }

    public function mount()
    {
        $this->pelajar = new Pelajar();
        $this->pelajar_user = new User();

        // DEBUGGING
        $this->fill([
            "pelajar_user.name" => "Pelajar 12",
            "password" => "password"
        ]);
    }

    // 
    // DB OPERATIONS FUNCTIONS
    // 
    public function create(){
        // SET DEFAULT PELAJAR PASSWORD
        $this->pelajar_user->password = Hash::make($this->pelajar_default_password);    
        
        // VALIDATE
        $this->validate();

        // SAVE PELAJAR
        $this->savePelajar();
        
        // POPULATE dokumen_ojt_pelajar_model_array

        // SAVE DOKUMEN OJT PELAJAR
        // $this->saveDokumenOJTPelajar();

        // MESSAGE
        session()->flash("status", "Rekod pelajar berjaya dihasilkan");
    }
    
    public function savePelajar(){
        $this->pelajar->user_id = $this->pelajar_user->id;

        $this->pelajar_user->save();
        $this->pelajar->save();
    }

    public function saveDokumenOJTPelajar(){

    }
    
    // 
    // MISC FUNCTIONS
    // 
    // Function for displaying appropiate tabs once clicked
    public function switchTab($tabName){
        $this->activeTab = $tabName;
    }

    public function populateDokumenOJTPelajarArray(){

    }
}
