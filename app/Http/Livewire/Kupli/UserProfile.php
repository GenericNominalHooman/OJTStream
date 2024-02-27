<?php

namespace App\Http\Livewire\Kupli;

use Livewire\Component;

class UserProfile extends Component
{
    public $activeTab = 'biodata'; // Variable to track which tab is opened
    public $kupli;
    public $kupli_user;

    public function render()
    {
        return view('livewire.kupli.user-profile');
    }

    public function rules(){
        return[
            'kupli_user.name' => 'required',
            'kupli_user.email' => 'required|email|unique:kuplis,email',
            'kupli_user.phone' => 'required|max:10',
            'kupli_user.gender' => 'required',
            'kupli_user.location' => 'required',
        ];
    }

    public function mount(){
        $this->kupli_user = auth()->user();
        $this->kupli = $this->kupli_user->Kupli;
    }

    public function update(){
        $this->validate();
        
        $this->kupli_user->save();
        // $this->kupli->save();

        session()->flash("status", "Profil anda telah berjaya dikemaskini");
    }
}
