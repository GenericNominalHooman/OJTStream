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
        Schema::create('dokumen_ojts_pelajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("dokumen_ojt_id")->constrained()->onDelete("cascade");
            $table->foreignId("pelajar_id")->constrained("pelajars", "user_id")->onDelete("cascade");
            $table->timestamp("deadline_date");
            $table->timestamp("submitted_at")->nullable(true);
            $table->text("document_name")->nullable(true);
            $table->text("document_path")->nullable(true);
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_ojts_pelajars');
    }
};
