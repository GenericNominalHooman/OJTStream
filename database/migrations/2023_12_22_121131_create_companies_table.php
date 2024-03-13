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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            
            $table->enum('type', ['public', 'private'])->default('private');
            $table->string('name', 255);
            $table->string('address')->nullable();
            $table->string('telephone_number', 32);
            $table->string('email');

            $table->string('ojt_supervisor', 64);

            $table->integer('students_deployed_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
