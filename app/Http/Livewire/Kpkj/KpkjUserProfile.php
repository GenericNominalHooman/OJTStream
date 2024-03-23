<?php

namespace App\Http\Livewire\Kpkj;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class KpkjUserProfile extends Component
{
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    public $kpkj;
    public $kpkj_user;

    // PASSWORD PROPERTIES
    public $old_password;
    public $new_password;
    public $new_password_confirmation;

    // 
    // COMPONENT FUNCTION
    // 
    public function render()
    {
        return view('livewire.kpkj.kpkj-user-profile');
    }

    public function rules(){
        return[
            'kpkj_user.name' => 'required',
            'kpkj_user.email' => 'required|email|unique:users,email,'.$this->kpkj_user->id,
            'kpkj_user.phone' => 'required|max:10',
            'kpkj_user.gender' => 'required',
            'kpkj_user.location' => 'required',
        ];
    }

    public function mount(){
        $this->kpkj_user = auth()->user();
        $this->kpkj = $this->kpkj_user->KetuaJabatanDanKetuaProgram;
    }

    // 
    // UPDATE FUNCTIONS
    // 
    public function update(){
        $this->validate();
        
        $this->kpkj_user->save();

        session()->flash("status", "Profil anda telah berjaya dikemaskini");
    }

    public function updatePassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
    
        // Verify the old password
        if (!Hash::check($this->old_password, $this->kpkj_user->password)) {
            $this->addError('old_password', 'The old password is incorrect.');
            return;
        }
    
        // Update the user's password only if the new password is different from the current password
        if (!Hash::check($this->new_password, $this->kpkj_user->password)) {
            $this->kpkj_user->password = $this->new_password;
            $this->kpkj_user->save();

            session()->flash('status', 'Kata laluan berjaya dikemaskini.');
        } else {
            $this->addError('new_password', 'The new password must be different from the current password.');
        }
    
        // Reset the input fields
        $this->old_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    // 
    // MISC FUNCTIONS
    // 
    public function switchTab($tabName){
        $this->activeTab = $tabName;
    }
}
