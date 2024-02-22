<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokumen_ojts', function (Blueprint $table) {
            $table->id();
            $table->string("document_name");
            $table->string("document_path");
            $table->string("document_description");
            $table->enum("document_type", ["pengisian", "infomasi"])->default("pengisian");
            $table->foreignId("kupli_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_ojts');
    }
};
