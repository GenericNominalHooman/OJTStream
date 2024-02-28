<?php

namespace App\Http\Livewire\Pelajar;

use App\Models\DokumenOJT;
use App\Models\DokumenOJTPelajar;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    // PELAJAR
    public $pelajar;
    public $pelajar_user;

    // COMPANY
    public $pelajar_pelajar_company;

    // DOKUMEN PELAJAR
    public $dokumen_ojt_pelajar_all;
    public $dokumen_ojt_pelajar_all_week;
    public $dokumen_ojt_pelajar_uploaded_all;

    // SKOP KERJA
    public $pelajar_skop_kerja;

    public function render()
    {
        return view('livewire.pelajar.dashboard', [
            "pelajar_pelajar_company"=>$this->pelajar_pelajar_company,
        ]);
    }

    public function mount(){
        $this->pelajar_user = auth()->user();
        $this->pelajar = $this->pelajar_user->Pelajar;
        $this->pelajar_pelajar_company = $this->pelajar->Pelajars_Company;

        // Calculate the start and end dates of the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        // DOKUMEN OJT PELAJAR
        $this->dokumen_ojt_pelajar_all = $this->pelajar->Dokumen_OJT_Pelajar;
        $this->dokumen_ojt_pelajar_uploaded_all = $this->dokumen_ojt_pelajar_all->whereNotNull("document_path");
        // Filter the collection to only include records with deadline_date within the current week
        $this->dokumen_ojt_pelajar_all_week = $this->dokumen_ojt_pelajar_all->whereBetween('deadline_date', [$startOfWeek, $endOfWeek]);
    }
}
