<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelajarsCompany extends Model
{
    use HasFactory;

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [
        "company_id",
    ];
}
