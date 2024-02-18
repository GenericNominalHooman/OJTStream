<?php

namespace App\Models;

use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use app\Models\Pensyarah_Penilai_OJT;
use Faker\Extension\CompanyExtension;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelajar extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     // Other pelajar properties to be verified
    // ];
    protected $primaryKey = "user_id";

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Pensyarah_Penilai_OJT(){
        return $this->hasOne(Pensyarah_Penilai_OJT::class, "id", "pensyarah_penilai_ojt_id");
    }

    public function Pensyarah_Penilai(){
        return $this->hasOne(Pensyarah_Penilai::class, "id", "pensyarah_penilai_id");
    }

    public function Penyelaras_Program(){
        return $this->hasOne(Penyelaras_Program::class, "id", "penyelaras_program_id");
    }

    public function Company(){
        return $this->hasOne(Company::class, "id", "company_id");
    }

    public function Janji_Temu_1(){
        return $this->hasOne(JanjiTemu::class, "id", "janji_temu_1");
    }

    public function Janji_Temu_2(){
        return $this->hasOne(JanjiTemu::class, "id", "janji_temu_2");
    }

    public function Janji_Temus(){
        return $this->hasMany(JanjiTemu::class, "pensyarah_penilai_ojt_id", "pensyarah_penilai_ojt_id");
    }

    public function Pelajars_Company(){
        return $this->hasOne(PelajarsCompany::class, "pelajar_id", "user_id");
    }

    public function Skop_Kerja(){
        return $this->hasOne(SkopKerja::class, "id", "skop_kerja_id");
    }
}
