<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pensyarah_Penilai_OJT extends Model
{
    use HasFactory;

    protected $table = 'pensyarah_penilai_ojts';

    public function User(){
        return $this->belongsTo(User::class);
    }
}
