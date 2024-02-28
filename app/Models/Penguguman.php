<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penguguman extends Model
{
    use HasFactory;

    protected $fillable = [
        "tajuk",
        "penguguman",
        "kupli_id",
    ];

    public function Kupli(){
        return $this->belongsTo(Kupli::class);
    }
}
