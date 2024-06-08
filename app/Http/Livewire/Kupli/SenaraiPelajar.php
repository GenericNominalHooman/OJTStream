<?php

namespace App\Http\Livewire\Kupli;

use App\Models\Pelajar;
use App\Models\User;
use Livewire\Component;

class SenaraiPelajar extends Component
{
    public $pelajars;
    public $search;
    
    public function render()
    {
        return view('livewire.kupli.senarai-pelajar', [
            "pelajars" => $this->pelajars,
        ]);
    }

    public function mount(){
        // $this->pelajars = Pelajar::orderBy("date_started", "asc")->get();
        $this->pelajars = Pelajar::whereHas('User', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('date_started', 'asc')->get();

            // Debugging: Output the results to the browser console
    $this->dispatchBrowserEvent('log', $this->pelajars->toArray());

    }
}
