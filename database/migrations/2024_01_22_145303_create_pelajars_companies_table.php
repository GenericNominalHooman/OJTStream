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
            $table->id('id');
            $table->bigInteger('pelajar_id')->unsigned()->nullable(false);
            $table->string('role')->nullable(true);
            $table->foreign('pelajar_id')->references('user_id')->on('pelajars')->onDelete('cascade');

            // COMPANY
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date("ojt_begin_date")->nullable(true);
            $table->date("ojt_end_date")->nullable(true);
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
