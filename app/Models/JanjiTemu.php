<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;

    public function pelajar(){
        return $this->belongsTo(Pelajar::class, "pensyarah_penilai_ojt_id", "pensyarah_penilai_ojt_id");
    }
}
