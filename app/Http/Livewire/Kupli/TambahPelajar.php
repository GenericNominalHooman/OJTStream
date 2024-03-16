<?php

namespace App\Http\Livewire\Kupli;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
use App\Models\DokumenOJT;
use App\Models\DokumenOJTPelajar;
use App\Models\Pelajar;
use Livewire\Component;
use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use Livewire\WithFileUploads;
use App\Models\PelajarsCompany;
use Carbon\Carbon;
use Database\Factories\DokumenOJTFactory;
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
    public $dokumen_ojt_all;

    // 
    // LIVEWIRE FUNCTIONS
    // 
    public function rules(){
        return [
        // PELAJAR BIODATA VALUES
        'pelajar_user.username' => 'required',
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
        $this->dokumen_ojt_all = DokumenOJT::get()  ;

        // DEBUGGING
        $this->fill([
            'pelajar_user.username' => 'pelajar21',
            'pelajar_user.email' => 'pelajar21@email.com',
            'pelajar_user.name' => 'Pelajar 21',
            'pelajar.matrix_number'=> 'AKV0222KA021',
            'pelajar.semester'=> '4',
            'pelajar.cohort'=> "2024-02-27",
            'pelajar.nric_number' => '040916080160',
            'pelajar.guardian' => 'Guardian 21',
            'pelajar_user.phone' => '0112713569',
            'pelajar.guardian_telephone_number' => '0165190476',
            'pelajar.program'=> 'KPD',
            'pelajar_user.gender' => 'male',
            'pelajar.study_type'=> 'DVM',
            'pelajar_user.location' => 'Location 21',
        ]);
    }

    // 
    // DB OPERATIONS FUNCTIONS
    // 
    public function create(){
        // VALIDATE
        $this->validate();
        
        // SAVE PELAJAR
        $this->savePelajar();
        
        // SAVE DOKUMEN OJT PELAJAR
        $this->saveDokumenOJTPelajar();

        // MESSAGE
        session()->flash("status", "Rekod pelajar berjaya dihasilkan");
    }
    
    public function savePelajar(){
        $this->pelajar->user_id = $this->pelajar_user->id;

        // SETS DEFAULT PASSWORD FOR PELAJAR
        $this->pelajar_user->password = $this->pelajar_default_password;

        $this->pelajar_user->save();
        $this->pelajar->save();
    }

    public function saveDokumenOJTPelajar(){
        // ITERATE THROUGH $dokumen_ojt_all
        $i=0;
        foreach($this->dokumen_ojt_all as $dokumen_ojt){
            $i++;
            
            $this->pelajar->Dokumen_OJT_Pelajar()->create([
                "document_name" => $dokumen_ojt->document_name,
                "deadline_date" => Carbon::parse(now())->addMonth($i),
                "dokumen_ojt_id" => $dokumen_ojt->id,
            ]);
        }
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
