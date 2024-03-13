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
        Schema::create('pelajars', function (Blueprint $table) {
            $table->id('user_id');       //Primary and Foreign Key
            $table->foreign('user_id')
                     ->references('id')->on('users')
                     ->onDelete('cascade'); // set cascade deletion
            $table->string('matrix_number', 12)->nullable(false)->unique();
            $table->enum('block', ['A', 'B', 'C', 'D', 'E', 'F', 'G'])->nullable(true)->default(null);
            $table->enum('dorm', ['201', '202', '203', '204','301', '302', '303', '304'])->nullable(true)->default(null);
            $table->enum('study_type', ['DVM', 'SVM'])->default('SVM')->nullable(true)->default(null);
            $table->integer('semester')->nullable(true)->default(null);
            
            $table->enum('status', ['Belum_OJT', 'Sedang_OJT', 'Selesai_OJT'])->default('Belum_OJT')->nullable(true)->default(null);
            $table->date('date_started')->nullable(true)->default(null);
            $table->date('date_completed')->nullable(true)->default(null);
            $table->integer('ojt_marks')->nullable(true)->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajars');
    }
};