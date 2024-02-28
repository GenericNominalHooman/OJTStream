<?php

namespace App\Http\Livewire\Kupli;

use App\Models\Penguguman;
use Livewire\Component;

class PengugumanCreate extends Component
{
    public $kupli;
    public $kupli_user;
    public $pengugumen_tajuk_input;
    public $pengugumen_penguguman_input;
    
    public function rules(){
        return[
            "pengugumen_tajuk_input" => "required",
            "pengugumen_penguguman_input" => "required",
        ];
    }
    
    public function render()
    {
        return view('livewire.kupli.penguguman-create');
    }

    public function mount(){
        $this->kupli_user = auth()->user();
        $this->kupli = $this->kupli_user->Kupli;
    }

    public function add(){
        $this->validate();

        Penguguman::create([
            "tajuk" => $this->pengugumen_tajuk_input,
            "penguguman" => $this->pengugumen_penguguman_input,
            "kupli_id" => $this->kupli->id,
        ]);

        return redirect()->route("kupli penguguman")->with("status", "Penguguman $this->pengugumen_tajuk_input berjaya ditambah");
    }
}
