<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemusPelajar extends Model
{
    use HasFactory;

    protected $fillable = [
        "visit_type",
        "janji_temu_id",
    ];
    
    public function JanjiTemu(){
        return $this->belongsTo(JanjiTemu::class, "janji_temu_id", "id");
    }
}
