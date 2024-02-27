<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenOJTPelajar extends Model
{
    use HasFactory;

    protected $table="dokumen_ojts_pelajars";

    protected $fillable = [
        "document_path",
        "document_name",
        "dokumen_ojt_id",
        "deadline_date",
    ];

    public function DokumenOJT(){
        return $this->belongsTo(DokumenOJT::class, "dokumen_ojt_id", "id");
    }
}
