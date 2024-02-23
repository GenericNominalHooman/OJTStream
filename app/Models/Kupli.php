<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupli extends Model
{
    use HasFactory;

    public function DokumenOJT(){
        return $this->hasMany(DokumenOJT::class, "kupli_id", "id");
    }
}
