<?php

namespace App\Http\Livewire\OJTStream;

use App\Models\User;
use App\Models\Company;
use App\Models\JanjiTemu;
use App\Models\Pelajar;
use App\Models\PelajarsCompany;
use Livewire\Component;
use App\Models\Pensyarah_Penilai;
use App\Models\Pensyarah_Penilai_OJT;

class UserProfile extends Component
{
    public User $user;
    public Pelajar $pelajar;
    public User $pensyarah_penilai_ojt;
    public User $pensyarah_penilai;
    public User $penyelaras_program_user;
    public JanjiTemu $janji_temu_1;
    public JanjiTemu $janji_temu_2;
    public PelajarsCompany $pelajars_company;
    public Company $company;
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened

    protected function rules()
    {
        // PELAJAR SECTION BEGIN
        if($this->user->isPelajar()){
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
                'file' => 'file|max:1024', // Adjust the max size as needed           

                // PENSYARAH PENILAI OJT VALUES
                'pensyarah_penilai_ojt.name' => 'required',
                'pensyarah_penilai_ojt.email' => 'required|email|unique:users,email,' . $this->user->id,
                'pensyarah_penilai_ojt.phone' => 'required|max:10',
                'pensyarah_penilai_ojt.gender' => 'required',
                'pensyarah_penilai_ojt.about' => 'required:max:150',
                'pensyarah_penilai_ojt.location' => 'required',
                // LAWATAN OJT
                'janji_temu_1.visit_at' => 'required',
                'janji_temu_2.visit_at' => 'required',
                
                // PENSYARAH PENILAI VALUES
                'pensyarah_penilai.name' => 'required',
                'pensyarah_penilai.email' => 'required|email|unique:users,email,' . $this->user->id,
                'pensyarah_penilai.phone' => 'required|max:10',
                'pensyarah_penilai.gender' => 'required',
                'pensyarah_penilai.about' => 'required:max:150',
                'pensyarah_penilai.location' => 'required',

                // PENYELARS PROGRAM VALUES
                'penyelaras_program_user.name' => 'required',
                'penyelaras_program_user.email' => 'required|email|unique:users,email,' . $this->user->id,
                'penyelaras_program_user.phone' => 'required|max:10',
                'penyelaras_program_user.gender' => 'required',
                'penyelaras_program_user.about' => 'required:max:150',
                'penyelaras_program_user.location' => 'required',

                // COMPANY VALUES
                'company.comp_type' => 'required|in:university,outside',
                'company.comp_name' => 'required|max:32',
                'company.comp_address_street' => 'max:255',
                'company.comp_address_city' => 'max:255',
                'company.comp_address_province' => 'max:255',
                'company.comp_contact' => 'required|max:32',
                'company.ojt_supervisor' => 'required|max:64',
                'company.students_deployed_count' => 'required|integer',
                'company.comp_email' => 'required|integer',
                
                // PELAJAR-COMPANY VALUES
                'pelajars_company.role' => 'required',
            ];
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
            // dd($this->pelajars_company);
            $this->company = $this->pelajars_company->Company;
            $this->penyelaras_program_user = $this->pelajar->Penyelaras_Program->User;
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

    public function update()
    {
        $this->validate();
        
        $profileUpdated = false;
        for($i=0; $i<sizeof($this->roles); $i++){
            if(in_array("Pelajar", $this->user->getRoles())){
                // PELAJAR SECTION BEGIN
                // Saves pelajar user profile changes
                $this->user->save();
                $this->pelajar->save();
                $profileUpdated = true;
                if ($this->file) {
                    // Process the file upload
                    $filename = $this->file->store('organisasi_latihan/job_description', 'public');
                    // You can now use $filename to save the path to the file in the database or perform other actions
                }            
                // PELAJAR SECTION ENDS
            }elseif(in_array("Pensyarah Penilai OJT", $this->user->getRoles())){

            }
        }

        // CHECK WHETHER ANY FIELD WAS UPDATED
        if($profileUpdated){
            return back()->withStatus('Profile successfully updated.');
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
}
