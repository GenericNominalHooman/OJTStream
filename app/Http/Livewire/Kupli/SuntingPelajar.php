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
use App\Models\Pensyarah_Penilai;
use App\Models\Pensyarah_Penilai_OJT;
use App\Models\Penyelaras_Program;
use Illuminate\Support\Facades\Storage;

class SuntingPelajar extends Component
{
    use WithFileUploads;
    public User $user;    
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    
    // PELAJAR PROEPRTIES BEGIN
    public Pelajar $pelajar;

    // PPO,PP AND PENYELARAS PROGRAM COLLECTION
    public $pensyarah_penilai_ojt;
    public $pensyarah_penilai;
    public $penyelaras_program;

    // JANJI TEMU COLLECTION
    public $janji_temu_all;
    public $janji_temu_pelajar_all;
    public $janji_temu_1 = "";
    public $janji_temu_2 = "";
    
    // JANJI TEMU INPUT
    public $janji_temu_1_input = "";
    public $janji_temu_2_input = "";
    
    // USER 
    public $pensyarah_penilai_ojt_user;
    public $pensyarah_penilai_user;
    public $penyelaras_program_user;

    // PPO,PO AND PENYELARAS PROGRAM INPUT
    public $pensyarah_penilai_ojt_input = "";
    public $pensyarah_penilai_input = "";
    public $penyelaras_program_input = "";

    // COMPANY COLLECTION
    public $company_all;

    // COMPANY PELAJAR
    public PelajarsCompany $pelajar_company;
    public Company $company;
    public $skop_kerja;
    public $skop_kerja_input;
    public $penyelaras_program_all;
    public $pensyarah_penilai_all;
    public $pensyarah_penilai_ojt_all;
    // PELAJAR PROEPRTIES ENDS

    public function render()
    {
        return view('livewire.kupli.sunting-pelajar', ["pensyarah_penilai_all" => $this->pensyarah_penilai_all]);
    }

    protected function rules()
    {
        // PELAJAR SECTION BEGIN
        // RETURN DIFFERENT RULES FOR DIFFERENT TYPE OF UPLOADS
        if($this->user->isPelajar()){
            if($this->activeTab == "biodata"){ // Biodata Only Update
                return [
                    // PELAJAR BIODATA VALUES
                    'user.name' => 'required',
                    'user.email' => 'required|email|unique:users,email,' . $this->user->id,
                    'user.phone' => 'required|max:10',
                    'user.gender' => 'required',
                    'user.location' => 'required',
                    'pelajar.nric_number' => 'required',
                    'pelajar.guardian' => 'required',
                    'pelajar.guardian_telephone_number' => 'required',
                    'pelajar.linkedin_url' => 'nullable|url',
                    'pelajar.facebook_url' => 'nullable|url',
                    'pelajar.github_url' => 'nullable|url',
                    'pelajar.study_type'=> 'required',
                    'pelajar.program'=> 'required',
                    'pelajar.heart_disease'=> 'nullable',
                    'pelajar.asthma'=> 'nullable',
                    'pelajar.diabetes'=> 'nullable',
                    'pelajar.osteoporosis'=> 'nullable',
                    'pelajar.slipped_disc'=> 'nullable',
                    'pelajar.matrix_number'=> 'required',
                    'pelajar.semester'=> 'required',
                    'pelajar.cohort'=> 'required',
    
                    // COMPANY VALUES
                    'company.type' => 'required',
                    'company.name' => 'required',
                    'company.address' => 'required',
                    'company.telephone_number' => 'required',
                    'company.ojt_supervisor' => 'required',
                    'company.students_deployed_count' => 'required',
                    'company.email' => 'required',
                    
                    // PELAJAR-COMPANY VALUES
                    'pelajar_company.role' => 'required',
                ];
            }else{ // Biodata And Skop Kerja Update
                return [
                    // PELAJAR BIODATA VALUES
                    'user.name' => 'required',
                    'user.email' => 'required|email|unique:users,email,' . $this->user->id,
                    'user.phone' => 'required|max:10',
                    'user.gender' => 'required',
                    'user.location' => 'required',
                    'pelajar.nric_number' => 'required',
                    'pelajar.guardian' => 'required',
                    'pelajar.guardian_telephone_number' => 'required',
                    'pelajar.linkedin_url' => 'nullable|url',
                    'pelajar.facebook_url' => 'nullable|url',
                    'pelajar.github_url' => 'nullable|url',
                    'pelajar.study_type'=> 'required',
                    'pelajar.program'=> 'required',
                    'pelajar.heart_disease'=> 'nullable',
                    'pelajar.asthma'=> 'nullable',
                    'pelajar.diabetes'=> 'nullable',
                    'pelajar.osteoporosis'=> 'nullable',
                    'pelajar.slipped_disc'=> 'nullable',
                    'pelajar.matrix_number'=> 'required',
                    'pelajar.semester'=> 'required',
                    'pelajar.cohort'=> 'required',
                    'skop_kerja_input' => 'file|mimes:pdf|required', // READD MAX SIZE IN PRODUCTION
    
                    // COMPANY VALUES
                    'company.comp_type' => 'required',
                    'company.name' => 'required',
                    'company.address' => 'required',
                    'company.telephone_number' => 'required',
                    'company.ojt_supervisor' => 'required',
                    'company.students_deployed_count' => 'required',
                    'company.email' => 'required',
                    
                    // PELAJAR-COMPANY VALUES
                    'pelajar_company.role' => 'required',
    
                    // JOB SCOPE
                    'skop_kerja.document_path' => 'required',
                    'skop_kerja.document_name' => 'required',
                ];
            }
        }
        // PELAJAR SECTION ENDS
    }

    public function mount(Pelajar $pelajar)
    {
        $this->pelajar = $pelajar;
        $this->user = $pelajar->User;
        $this->roles = $this->user->getRoles();

        // PPO,PP AND PENYELARAS PROGRAM COLLECTION
        $this->penyelaras_program_all = Penyelaras_Program::get();
        $this->pensyarah_penilai_all = Pensyarah_Penilai::get();
        $this->pensyarah_penilai_ojt_all = Pensyarah_Penilai_OJT::get();

        // JANJI TEMU COLLECTION
        $this->janji_temu_all = JanjiTemu::get();
        $this->janji_temu_pelajar_all = $this->pelajar->JanjiTemusPelajar;
            // SETS JANJI TEMU BASED ON TYPE
        foreach($this->janji_temu_pelajar_all as $janji_temu){
            switch ($janji_temu->visit_type) {
                case 'Lawatan PPO 1':
                    $this->janji_temu_1 = $janji_temu;
                    break;
                case 'Lawatan PPO 2':
                    $this->janji_temu_2 = $janji_temu;
                    break;                
            }
        }

        // PPO,PP AND PENYELARAS PROGRAM
        $this->pensyarah_penilai_ojt = $this->pelajar->Pensyarah_Penilai_OJT;
        $this->pensyarah_penilai = $this->pelajar->Pensyarah_Penilai;
        $this->penyelaras_program = $this->pelajar->Penyelaras_Program;

        // USER
        $this->pensyarah_penilai_ojt_user = $this->pensyarah_penilai_ojt == null ? null : $this->pensyarah_penilai_ojt->User;
        $this->pensyarah_penilai_user = $this->pensyarah_penilai == null ? null : $this->pensyarah_penilai->User;
        $this->penyelaras_program_user = $this->penyelaras_program == null ? null : $this->penyelaras_program->User;
        
        // COMPANY
        $this->company_all = Company::get();
        $this->pelajar_company = $this->pelajar->Pelajars_Company;
        $this->company = $this->pelajar_company->Company;
        $this->skop_kerja = $this->pelajar->Skop_Kerja;
        
        // Sets pelajar record to update instead of insertion
        $this->pelajar->user_id = $this->user->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function uploadSkopKerja(){
        if($this->skop_kerja_input!=null){
            $file_extension = $this->skop_kerja_input->getClientOriginalExtension();

            if($this->skop_kerja != null){
                // UPDATE SKOP KERJA
                $this->skop_kerja->document_name = "JOB_DESCRIPTION.".$file_extension;
                $this->skop_kerja->document_path = $this->skop_kerja_input->storeAs($this->pelajar->getPelajarDirectory().'/ORGANISASI_LATIHAN', $this->skop_kerja->document_name, 'local');        
            }else{
                // CREATE SKOP KERJA
                $this->skop_kerja = $this->pelajar->Skop_Kerja([
                    "document_name" => "JOB_DESCRIPTION.".$file_extension,
                    "document_path" => $this->skop_kerja_input->storeAs($this->pelajar->getPelajarDirectory().'/ORGANISASI_LATIHAN', "JOB_DESCRIPTION.pdf", 'local'),
                ]);
            }
        }
    }

    public function update()
    {
        // SAVE FILE IF USER IS UPLOADING SKOP KERJA
        if($this->skop_kerja_input != null){
            $this->uploadSkopKerja();
        }

        $result = $this->validate();

        $profileUpdated = false;
        for($i=0; $i<sizeof($this->roles); $i++){
            if(in_array("Pelajar", $this->user->getRoles())){
                // PELAJAR SECTION BEGIN
                $profileUpdated = true;
                // Saves pelajar user profile changes
                $this->user->save();
                $this->pelajar->save();
                                
                // SAVE FILE PATH TO DB
                $this->uploadSkopKerja();

                // PELAJAR SECTION ENDS
            }elseif(in_array("Pensyarah Penilai OJT", $this->user->getRoles())){

            }
        }

        // CHECK WHETHER ANY FIELD WAS UPDATED
        if($profileUpdated){
            return back()->withStatus('Profile updated successfully.');
        }else{
            return back()->withStatus('Error occcured while updating the profile.');
        }
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

    public function onPensyarahPenilaiOJTInputChange(){
        if($this->pensyarah_penilai_ojt_input!=null){
            // UPDATES pensyarah_penilai_ojt and pensyarah_penilai_ojt_user ON INPUT CHANGE
            $this->pensyarah_penilai_ojt = Pensyarah_Penilai_OJT::where("user_id", $this->pensyarah_penilai_ojt_input)->first();
            $this->pensyarah_penilai_ojt_user = $this->pensyarah_penilai_ojt->User;
            // dd($this->pensyarah_penilai_ojt_user );
        }
    }

    public function onPensyarahPenilaiInputChange(){
        if($this->pensyarah_penilai_input!=null){
            // UPDATES pensyarah_penilai and pensyarah_penilai_user ON INPUT CHANGE
            $this->pensyarah_penilai = Pensyarah_Penilai::where("user_id", $this->pensyarah_penilai_input)->first();
            $this->pensyarah_penilai_user = $this->pensyarah_penilai->User;
        }
    }
    
    public function onPenyelerasProgramInputChange(){
        if($this->penyelaras_program_input!=null){
            // UPDATES pensyarah_penilai_ojt and pensyarah_penilai_ojt_user ON INPUT CHANGE
            $this->penyelaras_program = Penyelaras_Program::where("user_id", $this->penyelaras_program_input)->first();
            $this->penyelaras_program_user = $this->penyelaras_program->User;
        }
    }

    public function onCompanyInputChange(){
        dd("TEST");
    }

    public function updateOJTPelajar(){
        // VALIDATE CORRECT INPUT
        $this->validate([
            "penyelaras_program_input"=> "nullable",
            "pensyarah_penilai_ojt_input"=> "nullable",
            "pensyarah_penilai_input"=> "nullable",
            "janji_temu_1_input"=> "nullable",
            "janji_temu_2_input"=> "nullable",
        ]);

        // GRAB ID FROM PPO, PP and PENYELARAS PROGRAM
        $penyelaras_program_id = $this->penyelaras_program == null ? null : $this->penyelaras_program->id;
        $pensyarah_penilai_id = $this->pensyarah_penilai == null ? null : $this->pensyarah_penilai->id;
        $pensyarah_penilai_ojt_id = $this->pensyarah_penilai_ojt  == null ? null : $this->pensyarah_penilai_ojt->id;

        // CREATE JANJI TEMU PELAJAR IF DOESNT EXIST
        if($this->janji_temu_1_input != ""){
            if($this->janji_temu_1 == null){
                // CREATE RECORD
                $this->janji_temu_1 = $this->pelajar->JanjiTemusPelajar()->create([
                    "visit_type" => "Lawatan PPO 1",
                    "janji_temu_id" => $this->janji_temu_1_input,
                ]);
            }else{
                // UPDATE RECORD
                $this->janji_temu_1->update([
                    "janji_temu_id" => $this->janji_temu_1_input,
                ]);
            }
        }
        if ($this->janji_temu_2_input != ""){
            if($this->janji_temu_2 == null){
                $this->janji_temu_2 = $this->pelajar->JanjiTemusPelajar()->create([
                    "visit_type" => "Lawatan PPO 2",
                    "janji_temu_id" => $this->janji_temu_2_input,
                ]);
            }else{
                // UPDATE RECORD
                $this->janji_temu_2->update([
                    "janji_temu_id" => $this->janji_temu_2_input,
                ]);
            }
        }
        
        // UPDATE PELAJAR TABLE
        if($pensyarah_penilai_ojt_id != null||""){
            $this->pelajar->update([
                "pensyarah_penilai_ojt_id" => $pensyarah_penilai_ojt_id,
            ]);
        }
        if($penyelaras_program_id != null||""){
            $this->pelajar->update([
                "penyelaras_program_id" => $penyelaras_program_id,
            ]);
        }
        if($pensyarah_penilai_id != null||""){
            $this->pelajar->update([
                "pensyarah_penilai_id" => $pensyarah_penilai_id,
            ]);
        }
        if($this->janji_temu_1_input != null||""){
            $this->pelajar->update([
                "janji_temu_1" => $this->janji_temu_1->id,
            ]);
        }
        if($this->janji_temu_2_input != null||""){
            $this->pelajar->update([
                "janji_temu_2" => $this->janji_temu_2->id,
            ]);
        }

        // REFRESH PAGE
        return redirect()->back()->with("status", "Maklumat OJT pelajar ".$this->user->name." berjaya dikemaskini");
    }
}
