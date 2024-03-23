<?php

namespace App\Http\Livewire\Kupli;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    public $kupli;
    public $kupli_user;

    // PASSWORD PROPERTIES
    public $old_password;
    public $new_password;
    public $new_password_confirmation;

    // 
    // COMPONENT FUNCTION
    // 
    public function render()
    {
        return view('livewire.kupli.user-profile');
    }

    public function rules(){
        return[
            'kupli_user.name' => 'required',
            'kupli_user.email' => 'required|email|unique:users,email,'.$this->kupli_user->id,
            'kupli_user.phone' => 'required|max:10',
            'kupli_user.gender' => 'required',
            'kupli_user.location' => 'required',
        ];
    }

    public function mount(){
        $this->kupli_user = auth()->user();
        $this->kupli = $this->kupli_user->Kupli;
    }

    // 
    // UPDATE FUNCTIONS
    // 
    public function update(){
        $this->validate();
        
        $this->kupli_user->save();

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
        if (!Hash::check($this->old_password, $this->kupli_user->password)) {
            $this->addError('old_password', 'The old password is incorrect.');
            return;
        }
    
        // Update the user's password only if the new password is different from the current password
        if (!Hash::check($this->new_password, $this->kupli_user->password)) {
            $this->kupli_user->password = $this->new_password;
            $this->kupli_user->save();

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
