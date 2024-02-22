<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pensyarah_Penilai extends Model
{
    use HasFactory;

    protected $table = "pensyarah_penilais";

    public function User(){
        return $this->belongsTo(User::class);
    }
}
