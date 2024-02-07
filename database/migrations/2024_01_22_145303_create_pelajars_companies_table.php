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
        Schema::create('pelajars_companies', function (Blueprint $table) {
            // PELAJAR
            $table->id('pelajar_id');
            $table->string('role')->nullable(false);
            $table->foreign('pelajar_id')->references('user_id')->on('pelajars')->onDelete('cascade');

            // COMPANY
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date("ojt_begin_date")->nullable(false);
            $table->date("ojt_end_date")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajars_companies');
    }
};
