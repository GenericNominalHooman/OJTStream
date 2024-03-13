<?php

namespace App\Http\Livewire\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelajar;
use Livewire\Component;
use App\Models\DokumenOJT;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Node\Block\Document;

class Register extends Component
{

    public $username ='';
    public $name ='';
    public $email = '';
    public $password = '';
    public $no_matrik = '';
    public $dokumen_ojt_all;
    public $pelajar;

    protected $rules=[
    'username' => 'required|min:3|unique:users,username',
    'name' => 'required|min:3',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:5',
    'no_matrik' => 'required|unique:pelajars,matrix_number'
    ];

    public function store(){
        $attributes = $this->validate();

        $user = User::create($attributes);

        // CREATE PELAJAR USER
        $this->pelajar = Pelajar::create([
            "matrix_number" => $this->no_matrik,
            "user_id" => $user->id,
        ]);

        // CREATE DOKUMEN PELAJAR
        $this->saveDokumenOJTPelajar();

        auth()->login($user);
        
        return redirect('/dashboard');
    } 

    public function mount(){
        $this->fill([
            'username' => 'Iskandar',
            'name' => 'MUHAMMAD ISKANDAR LUQMAN BIN ZAHARI',
            'email' => 'muhammadiskandarluqman@email.com',
            'password' => 'password',
            'no_matrik' => 'AKV0222KA020'
        ]);    

        $this->dokumen_ojt_all = DokumenOJT::get();
    }

    public function saveDokumenOJTPelajar(){
        // ITERATE THROUGH $dokumen_ojt_all
        $i=0;
        foreach($this->dokumen_ojt_all as $dokumen_ojt){
            $i++;
            
            $this->pelajar->Dokumen_OJT_Pelajar()->create([
                "document_name" => $dokumen_ojt->document_name,
                "deadline_date" => Carbon::parse(now())->addMonth($i),
                "dokumen_ojt_id" => $dokumen_ojt->id,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
