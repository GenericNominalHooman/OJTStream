<?php

namespace App\Http\Livewire\OJTStream;

use PDO;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\Pelajar;
use Livewire\Component;
use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use Livewire\WithFileUploads;
use App\Models\PelajarsCompany;
use App\Models\Pensyarah_Penilai;
use App\Models\Penyelaras_Program;
use Illuminate\Support\Facades\Hash;
use App\Models\Pensyarah_Penilai_OJT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Component
{
    use WithFileUploads;
    public User $user;    
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    
    // PELAJAR PROEPRTIES BEGIN
    public Pelajar $pelajar;

    // PPO,PP AND PENYELARAS PROGRAM VALUES
    public ?Pensyarah_Penilai_OJT $pensyarah_penilai_ojt=null;
    public ?Pensyarah_Penilai $pensyarah_penilai=null;
    public ?Penyelaras_Program $penyelaras_program=null;
    public ?User $pensyarah_penilai_ojt_user=null;
    public ?User $pensyarah_penilai_user=null;
    public ?User $penyelaras_program_user=null;

    // JANJI TEMU VALUES
    public ?JanjiTemu $janji_temu_1=null;
    public ?JanjiTemu $janji_temu_2=null;

    // COMPANY VALUES
    public ?PelajarsCompany $pelajar_pelajar_company=null;
    public ?Company $pelajar_company=null;
    public $company_selected;
    public $company_input;
    public $company_all;
    public $tarikh_mula_ojt_input;
    public $tarikh_tamat_ojt_input;

    // SKOP KERJA VALUES
    public ?SkopKerja $skop_kerja=null;
    public $skop_kerja_input;

    // HAS VALUES
    public $pelajarHas = false;
    public $pelajarHasCompanyPelajar = false;
    public $pelajarHasPensyarahPenilai = false;
    public $pelajarHasPensyarahPenilaiOJT = false;
    public $pelajarHasPenyelarasProgram = false;
    public $pelajarHasSkopKerja = false;
    public $pelajarHasJanjiTemu1 = false;
    public $pelajarHasJanjiTemu2 = false;

    // UPDATE PASSWORD FIELD VALUES
    public $old_password;
    public $new_password;
    public $new_password_confirmation;
    
    // 
    // LIVEWIRE FUNCTIONS
    // 
    protected function rules()
    {
        // PELAJAR SECTION BEGIN
        if($this->activeTab == 'biodata'){ // Biodata Only Update
            return [
                // PELAJAR BIODATA VALUES
                'user.name' => 'required',
                'user.email' => 'required|email|unique:users,email',
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
        }else if($this->activeTab == 'organisasi'){ // Biodata And Skop Kerja Update
            if($this->pelajar_pelajar_company){
                // ALLOWS UPDATE OF TARIKH MULA DAN TARIKH TAMAT TANPA PERLU UPLOAD SKOP KERJA
                return [
                    // SKOP KERJA VALUE
                    'skop_kerja_input' => 'file|mimes:pdf|nullable', // READD MAX SIZE IN PRODUCTION
    
                    'company_input' => 'required',
    
                    // PELAJAR-COMPANY VALUES
                    'pelajar_company.role' => 'nullable',
                    'tarikh_mula_ojt_input' => 'required',
                    'tarikh_tamat_ojt_input' => 'required',
                ];
            }else{
                    // ALLOWS UPDATE OF TARIKH MULA DAN TARIKH TAMAT TANPA PERLU UPLOAD SKOP KERJA
                    return [
                    // SKOP KERJA VALUE
                    'skop_kerja_input' => 'file|mimes:pdf|required', // READD MAX SIZE IN PRODUCTION

                    'company_input' => 'required',

                    // PELAJAR-COMPANY VALUES
                    'pelajar_company.role' => 'nullable',
                    'tarikh_mula_ojt_input' => 'required',
                    'tarikh_tamat_ojt_input' => 'required',
                ];
            }
        }
        // PELAJAR SECTION ENDS
    }

    public function mount()
    {
        // REDIRECT HANDLER
        request()->get('active_tab') ? $this->activeTab = request()->get('active_tab') : "biodata";
        
        $this->user = auth()->user();
        $this->roles = $this->user->getRoles();

        // GET DATA TO BE USED
        $this->user = auth()->user();
        $this->getPelajar();
        $this->getPelajarPenyelarasProgram();
        $this->getPelajarPensyarahPenilai();
        $this->getPelajarPensyarahPenilaiOJT();
        $this->getPelajarSkopKerja();
        $this->getPelajarJanjiTemu();
        $this->getPelajarCompanyInformation();
        $this->company_all = Company::get();

        // Sets pelajar record to update instead of insertion
        $this->pelajar->user_id = $this->user->id;
    }

    // public function update(){
    //     dd("update");
    // }
    
    public function render()
    {
        // Rediret based on user roles    
        return view('livewire.o-j-t-stream.user-profile', [
            "company" => $this->pelajar_company,
        ]);
    }
    
    // 
    // UPDATE FUNCTIONS
    // 
    public function updateBiodata(){
        // UPDATE USER AND PELAJAR
        $this->pelajar->save();
        $this->user->save();

        // MESSAGE
        session()->flash("status", "Berjaya mengemaskini maklumat biodata profil");
    }
    
    public function savePelajarCompanyInformation(){
        if($this->company_input){
            if($this->pelajar_pelajar_company){
                // UPDATE PELAJAR COMPANY RECORD
                if($this->pelajar_pelajar_company){
                    $this->pelajar_pelajar_company->company_id = $this->company_selected->id;
                    $this->pelajar_pelajar_company->ojt_begin_date = $this->tarikh_mula_ojt_input;
                    $this->pelajar_pelajar_company->ojt_end_date = $this->tarikh_tamat_ojt_input;
                    $this->pelajar_pelajar_company->save();
                }
            }else{
                // CREATE PELAJAR COMPANY RECORD
                // dd(Carbon::parse($this->tarikh_mula_ojt_input)->format("Y-m-d"));
                PelajarsCompany::create([
                    "pelajar_id" => $this->pelajar->user_id,
                    "company_id" => $this->company_selected->id,
                    "ojt_begin_date" => Carbon::parse($this->tarikh_mula_ojt_input)->format("Y-m-d"),
                    "ojt_end_date" => Carbon::parse($this->tarikh_tamat_ojt_input)->format("Y-m-d"),
                    "role" => "",
                ]);
            }
        }
    }

    public function updateOrganisasi(){        
        // VALIDATE
        $this->validate();

        // UPDATE DB
        if($this->skop_kerja_input != null){
            $this->uploadAndSaveSkopKerja();
            $this->pelajar->skop_kerja_id = $this->skop_kerja->id;
        }
        $this->savePelajarCompanyInformation();
        $this->pelajar->save();
        
        // MESSAGE
        session()->flash("status", "Maklumat organisasi anda telah berjaya dikemaskini");
    }

    // public function updateOrganisasi(){        
    //     // SAVE FILE
    //     if($this->skop_kerja_input != null){
    //         // CREATE OR UPLOAD A SKOP KERJA
    //         $this->uploadAndSaveSkopKerja();
    //         $this->pelajar->update([
    //             "skop_kerja_id" => $this->skop_kerja->id,
    //         ]);    
    //     }
    //     if($this->company_input != null){

    //         if($this->pelajarHasCompanyPelajar){
    //         }

    //         $this->pelajar->update([
    //             "pelajar_company_id" => $this->skop_kerja->id,
    //         ]);    
    //         $this->pelajar_pelajar_company->save();
    //     }

    //     // Dump the pelajar instance after the update attempt
    //     dd($this->pelajar);
        
    //     if($this->company_input != null){
    //         $this->pelajar_pelajar_company->update([
    //             "company_id" => $this->company_input,
    //         ]);
    //     }
        
    //     // MESSAGE
    //     session()->flash("status", "Maklumat organisasi anda telah berjaya dikemaskini");
    // }

    public function uploadAndSaveSkopKerja(){
        $file_extension = $this->skop_kerja_input->getClientOriginalExtension();
        if($this->skop_kerja != null){
            // UPDATE SKOP KERJA
            $this->skop_kerja->document_name = "JOB_DESCRIPTION.".$file_extension;
            $this->skop_kerja->document_path = $this->skop_kerja_input->storeAs($this->pelajar->getPelajarDirectory().'/ORGANISASI_LATIHAN', $this->skop_kerja->document_name, 'local');                
            $this->skop_kerja->save();
        }else{
            // CREAET SKOP KERJA
            $this->skop_kerja = $this->pelajar->Skop_Kerja()->create([
                "document_name" => "JOB_DESCRIPTION.".$file_extension,
                "document_path" => $this->skop_kerja_input->storeAs($this->pelajar->getPelajarDirectory().'/ORGANISASI_LATIHAN', "JOB_DESCRIPTION.".$file_extension, 'local'),
            ]);
        }
    }

    public function createAndSaveCompany(){ 
        if($this->pelajar_pelajar_company != null){
            // UPDATE PELAJAR COMPANY
            $this->pelajar_pelajar_company->update([
                "company_id" => $this->company_input,
            ]);
        }else{
            // CREAET PELAJAR COMPANY
            $this->pelajar->Pelajars_Company()->create([
                "pelajar_id" => $this->pelajar->id,
                "company_id" => $this->company_input,
            ]);
        }
    }

    public function createAndSaveCompanyRole(){ 
        if($this->pelajar_pelajar_company != null){
            // UPDATE PELAJAR COMPANY
            $this->pelajar_pelajar_company->update([
                "role" => $this->pelajar_pelajar_company->role,
            ]);
        }else{
            // CREAET PELAJAR COMPANY
            $this->pelajar->Pelajars_Company->save();
        }
    }

    public function updatePassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
    
        // Verify the old password
        if (!Hash::check($this->old_password, $this->user->password)) {
            $this->addError('old_password', 'The old password is incorrect.');
            return;
        }
    
        // Update the user's password only if the new password is different from the current password
        if (!Hash::check($this->new_password, $this->user->password)) {
            $this->user->password = Hash::make($this->new_password);
            $this->user->save();

            session()->flash('status', 'Kata kunci berjaya dikemaskini.');
        } else {
            $this->addError('new_password', 'The new password must be different from the current password.');
        }
    
        // Reset the input fields
        $this->old_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    // 
    // GET FUNCTIONS
    // 
    public function getPelajarCompanyInformation(){
        if($this->pelajar->Pelajars_Company == null){
            $this->pelajarHasCompanyPelajar = false;
        }else{
            $this->pelajarHasCompanyPelajar = true;
            $this->pelajar_pelajar_company = $this->pelajar->Pelajars_Company;
            $this->pelajar_company = $this->pelajar_pelajar_company->Company;
            $this->company_selected = $this->pelajar_company;
            $this->tarikh_mula_ojt_input = $this->pelajar_pelajar_company->ojt_begin_date;
            $this->tarikh_tamat_ojt_input = $this->pelajar_pelajar_company->ojt_end_date;
            $this->company_input = $this->pelajar_pelajar_company->company_id;
        }
    }

    public function getPelajarPensyarahPenilai(){
        if($this->pelajar->Pensyarah_Penilai == null){
            $this->pelajarHasPensyarahPenilai = false;
        }else{
            $this->pelajarHasPensyarahPenilai = true;
            $this->pensyarah_penilai = $this->pelajar->Pensyarah_Penilai;
            $this->pensyarah_penilai_user = $this->pensyarah_penilai->User;
        }
    }

    public function getPelajarPensyarahPenilaiOJT(){
        if($this->pelajar->Pensyarah_Penilai_OJT == null){
            $this->pelajarHasPensyarahPenilaiOJT = false;
        }else{
            $this->pelajarHasPensyarahPenilaiOJT = true;
            $this->pensyarah_penilai_ojt = $this->pelajar->Pensyarah_Penilai_OJT;
            $this->pensyarah_penilai_ojt_user = $this->pensyarah_penilai_ojt->User;
        }
    }
    
    public function getPelajarPenyelarasProgram(){
        if($this->pelajar->Penyelaras_Program == null){
            $this->pelajarHasPenyelarasProgram = false;
        }else{
            $this->pelajarHasPenyelarasProgram = true;
            $this->penyelaras_program = $this->pelajar->Penyelaras_Program;
            $this->penyelaras_program_user = $this->penyelaras_program->User;
        }
    }
    
    public function getPelajarSkopKerja(){
        if($this->pelajar->Skop_Kerja == null){
            $this->pelajarHasSkopKerja = false;
        }else{
            $this->pelajarHasSkopKerja = true;
            $this->skop_kerja = $this->pelajar->Skop_Kerja;
        }
    }

    public function getPelajarJanjiTemu(){
        if($this->pelajar->JanjiTemusPelajar != null){
            foreach($this->pelajar->JanjiTemusPelajar as $janji_temu_pelajar){
                if($janji_temu_pelajar->visit_type == "Lawatan PPO 1"){
                    $this->pelajarHasJanjiTemu1 = true;
                    $this->janji_temu_1 = $janji_temu_pelajar->JanjiTemu;
                }else if($janji_temu_pelajar->visit_type == "Lawatan PPO 2"){
                    $this->pelajarHasJanjiTemu2 = true;
                    $this->janji_temu_2 = $janji_temu_pelajar->JanjiTemu;
                }
            }
        }
    }

    public function getPelajar(){   
        if($this->user->Pelajar == null){
            $this->pelajarHas = false;
        }else{
            $this->pelajarHas = true;
            $this->pelajar = $this->user->Pelajar;
        }
    }

    // 
    // MISC FUNCTIONS
    // 
    // Function for displaying appropiate tabs once clicked
    public function switchTab($tabName){
        $this->activeTab = $tabName;
    }

    public function onCompanyInputChange(){
        $this->company_selected = Company::where("id", $this->company_input)->first();

    }

    public function downloadSkopKerja(){
        if(Storage::disk("local")->exists($this->skop_kerja->document_path)){
            return Storage::disk("local")->download($this->skop_kerja->document_path, $this->skop_kerja->document_name);
        }else{
            return redirect()->response("No file found", 404);
        }
    }

    // public function update()
    // {
    //     // SAVE FILE IF USER IS UPLOADING SKOP KERJA
    //     if($this->skop_kerja_input != null){
    //         $this->uploadSkopKerja();
    //     }

    //     $this->validate();

    //     $profileUpdated = false;
    //     for($i=0; $i<sizeof($this->roles); $i++){
    //         if(in_array("Pelajar", $this->user->getRoles())){
    //             dd("test");
    //             // PELAJAR SECTION BEGIN
    //             $profileUpdated = true;
    //             // Saves pelajar user profile changes
    //             $this->user->save();
    //             $this->pelajar->save();
                                
    //             // SAVE FILE PATH TO DB
    //             dd($this->skop_kerja->save());

    //             // PELAJAR SECTION ENDS
    //         }elseif(in_array("Pensyarah Penilai OJT", $this->user->getRoles())){

    //         }
    //     }

    //     // CHECK WHETHER ANY FIELD WAS UPDATED
    //     if($profileUpdated){
    //         return back()->withStatus('Profile updated successfully.');
    //     }else{
    //         return back()->withStatus('Error occcured while updating the profile.');
    //     }
    // }
}