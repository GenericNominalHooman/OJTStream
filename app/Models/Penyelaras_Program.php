<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelaras_Program extends Model
{
    use HasFactory;

    protected $table = "penyelaras_programs";

    public function User(){
        return $this->belongsTo(User::class);
    }
}
