<?php

namespace App\Http\Livewire\OJTStream;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{

    public User $user;
    public $roles = [];
    public $activeTab = 'biodata'; // Variable to track which tab is opened

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'user.phone' => 'required|max:10',
            'user.about' => 'required:max:150',
            'user.location' => 'required'
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->roles = $this->user->getRoles();
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        if (env('IS_DEMO') && $this->user->id == 1) {

            if (auth()->user()->email == $this->user->email) {

                $this->user->save();
                return back()->withStatus('Profile successfully updated.');
            }

            return back()->with('demo', "You are in a demo version, you can't change the admin email.");
        };

        $this->user->save();
        return back()->withStatus('Profile successfully updated.');
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
