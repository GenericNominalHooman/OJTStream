<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     // Other pelajar properties to be verified
    // ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
