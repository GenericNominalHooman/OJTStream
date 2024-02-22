<?php

namespace App\Http\Livewire\OJTStream;

use App\Models\User;
use App\Models\Company;
use App\Models\Pelajar;
use Livewire\Component;
use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use Livewire\WithFileUploads;
use App\Models\PelajarsCompany;
use App\Models\Pensyarah_Penilai;
use Illuminate\Support\Facades\File;
use App\Models\Pensyarah_Penilai_OJT;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Component
{
    use WithFileUploads;
    public User $user;    
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    
    // PELAJAR PROEPRTIES BEGIN
    public Pelajar $pelajar;
    public User $pensyarah_penilai_ojt;
    public User $pensyarah_penilai;
    public User $penyelaras_program_user;
    public JanjiTemu $janji_temu_1;
    public JanjiTemu $janji_temu_2;
    public PelajarsCompany $pelajars_company;
    public Company $company;
    public SkopKerja $skop_kerja;
    public $skop_kerja_input;
    // PELAJAR PROEPRTIES ENDS

    protected function rules()
    {
        // PELAJAR SECTION BEGIN
        // RETURN DIFFERENT RULES FOR DIFFERENT TYPE OF UPLOADS
        // RETURN DIFFERENT RULES FOR DIFFERENT TYPE OF UPLOADS
        // RETURN DIFFERENT RULES FOR DIFFERENT TYPE OF UPLOADS
        if($this->user->isPelajar()){
            if($this->skop_kerja_input == null){ // Biodata Only Update
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
                    'company.comp_type' => 'required',
                    'company.comp_name' => 'required',
                    'company.comp_address_street' => 'required',
                    'company.comp_address_city' => 'required',
                    'company.comp_address_province' => 'required',
                    'company.comp_contact' => 'required',
                    'company.ojt_supervisor' => 'required',
                    'company.students_deployed_count' => 'required',
                    'company.comp_email' => 'required',
                    
                    // PELAJAR-COMPANY VALUES
                    'pelajars_company.role' => 'required',
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
                    'company.comp_name' => 'required',
                    'company.comp_address_street' => 'required',
                    'company.comp_address_city' => 'required',
                    'company.comp_address_province' => 'required',
                    'company.comp_contact' => 'required',
                    'company.ojt_supervisor' => 'required',
                    'company.students_deployed_count' => 'required',
                    'company.comp_email' => 'required',
                    
                    // PELAJAR-COMPANY VALUES
                    'pelajars_company.role' => 'required',
    
                    // JOB SCOPE
                    'skop_kerja.document_path' => 'required',
                    'skop_kerja.document_name' => 'required',
                ];
            }
        }
        // PELAJAR SECTION ENDS
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->roles = $this->user->getRoles();

        // PELAJAR SECTION BEGIN
        if($this->user->isPelajar()){
            // SETS DATA TO BE USED
            $this->pelajar = $this->user->Pelajar;
            $this->pensyarah_penilai_ojt = $this->pelajar->Pensyarah_Penilai_OJT->User;
            $this->pensyarah_penilai = $this->pelajar->Pensyarah_Penilai->User;
            $this->pelajars_company = $this->pelajar->Pelajars_Company;
            $this->company = $this->pelajars_company->Company;
            $this->penyelaras_program_user = $this->pelajar->Penyelaras_Program->User;
            $this->skop_kerja = $this->pelajar->Skop_Kerja;
            if($this->pelajar->Janji_Temu_1 != null){
                $this->janji_temu_1 = $this->pelajar->Janji_Temu_1;
            }
            if($this->pelajar->Janji_Temu_2 != null){
                $this->janji_temu_2 = $this->pelajar->Janji_Temu_2;
            }

            // Sets pelajar record to update instead of insertion
            $this->pelajar->user_id = $this->user->id;

        }
        // PELAJAR SECTION ENDS
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function uploadSkopKerja(){
        $file_extension = $this->skop_kerja_input->getClientOriginalExtension();
        $this->skop_kerja->document_name = "JOB_DESCRIPTION.".$file_extension;
        $this->skop_kerja->document_path = $this->skop_kerja_input->storeAs($this->pelajar->getPelajarDirectory().'/ORGANISASI_LATIHAN', $this->skop_kerja->document_name, 'local');        
        $this->skop_kerja->updated_at = now();        
    }

    public function update()
    {
        // SAVE FILE IF USER IS UPLOADING SKOP KERJA
        if($this->skop_kerja_input != null){
            $this->uploadSkopKerja();
        }
        
        $this->validate();

        $profileUpdated = false;
        for($i=0; $i<sizeof($this->roles); $i++){
            if(in_array("Pelajar", $this->user->getRoles())){
                // PELAJAR SECTION BEGIN
                $profileUpdated = true;
                // Saves pelajar user profile changes
                $this->user->save();
                $this->pelajar->save();
                                
                // SAVE FILE PATH TO DB
                $this->skop_kerja->save();

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

    public function render()
    {
        // Rediret based on user roles    
        return view('livewire.o-j-t-stream.user-profile');
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
