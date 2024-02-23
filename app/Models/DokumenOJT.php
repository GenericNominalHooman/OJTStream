<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenOJT extends Model
{
    use HasFactory;

    protected $table = "dokumen_ojts";

    protected $fillable = [
        "document_name",
        "document_description",
        "document_type",
        "document_path",
    ];
}
