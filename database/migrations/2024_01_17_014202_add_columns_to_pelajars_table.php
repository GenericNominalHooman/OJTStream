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
        Schema::table('pelajars', function (Blueprint $table) {
            $table->string('nric_number', 12)->nullable(false);
            $table->string('guardian')->nullable(true);
            $table->integer('guardian_telephone_number')->nullable(true);

            // Social media link - to implement
            $table->string('linkedin_url')->nullable(true);
            $table->string('facebook_url')->nullable(true);
            $table->string('github_url')->nullable(true);
            // Social media link - to implement
            
            $table->string('program')->nullable(false);
            $table->date('cohort')->nullable(false);
            $table->string('address')->nullable(false);

            // Chronic illness
            $table->boolean('heart_disease')->default(false);
            $table->boolean('asthma')->default(false);
            $table->boolean('diabetes')->default(false);
            $table->boolean('osteoporosis')->default(false);

            // Pensyarah penilai
            $table->foreignId('pensyarah_penilai_id')->constrained()->onDelete('cascade')->nullable(true);
            
            // Pensyarah penilai ojt
            $table->foreignId('pensyarah_penilai_ojt_id')->constrained()->onDelete('cascade')->nullable(true);

            // Penyeleras program
            $table->foreignId('penyelaras_program_id')->constrained()->onDelete('cascade')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelajars', function (Blueprint $table) {
            $table->dropColumn('nric_number');
            $table->dropColumn('guardian');
            $table->dropColumn('guardian_telephone_number');

            // Social media link - to implement
            $table->dropColumn('linkedin_url');
            $table->dropColumn('facebook_url');
            $table->dropColumn('github_url');
            // Social media link - to implement
            
            $table->dropColumn('program');
            $table->dropColumn('cohort');
            $table->dropColumn('address');

            // Chronic illness
            $table->dropColumn('heart_disease');
            $table->dropColumn('asthma');
            $table->dropColumn('diabetes');
            $table->dropColumn('osteoporosis');

            // Pensyarah penilai
            $table->dropForeign('pelajars_pensyarah_penilai_id_foreign');
            
            // Pensyarah penilai ojt
            $table->dropForeign('pelajars_pensyarah_penilai_ojt_id_foreign');

            // Penyelaras program
            $table->dropForeign("pelajars_penyelaras_program_id_foreign");
        });
    }
};
