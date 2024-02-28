<?php

namespace App\Http\Livewire\Kupli;

use App\Models\Penguguman;
use Livewire\Component;

class PengugumanEdit extends Component
{
    public $penguguman;
    
    public function rules(){
        return [
            "penguguman.tajuk" => "required",
            "penguguman.penguguman" => "required",
        ];
    }

    public function render()
    {
        return view('livewire.kupli.penguguman-edit');
    }

    public function mount(Penguguman $penguguman){
        $this->penguguman = $penguguman;
    }

    public function deletePenguguman(){
        $this->penguguman->delete();
        return redirect()->route("kupli penguguman")->with("status", "Penguguman berjaya dihapus");
    }

    public function kemaskiniPenguguman(){
        $this->penguguman->save();
        return redirect()->route("kupli penguguman")->with("status", "Penguguman berjaya dikemaskini");
    }
}
