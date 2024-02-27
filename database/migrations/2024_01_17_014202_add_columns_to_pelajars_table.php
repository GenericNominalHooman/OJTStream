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

            // Chronic illness
            $table->boolean('heart_disease')->nullable(true);
            $table->boolean('asthma')->nullable(true);
            $table->boolean('diabetes')->nullable(true);
            $table->boolean('osteoporosis')->nullable(true);
            $table->boolean('slipped_disc')->nullable(true);

            // Pensyarah penilai
            $table->bigInteger('pensyarah_penilai_id')->unsigned()->nullable(true);
            $table->foreign('pensyarah_penilai_id')->references("id")->on("pensyarah_penilais")->nullOnDelete();
            
            // Pensyarah penilai ojt
            $table->bigInteger('pensyarah_penilai_ojt_id')->unsigned()->nullable(true);
            $table->foreign('pensyarah_penilai_ojt_id')->references("id")->on("pensyarah_penilai_ojts")->nullOnDelete();
            
            // Penyeleras program
            $table->bigInteger('penyelaras_program_id')->unsigned()->nullable(true);
            $table->foreign('penyelaras_program_id')->references("id")->on("penyelaras_programs")->nullOnDelete();
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

            // Chronic illness
            $table->dropColumn('heart_disease');
            $table->dropColumn('asthma');
            $table->dropColumn('diabetes');
            $table->dropColumn('osteoporosis');
            $table->dropColumn('slipped_disc');

            // Pensyarah penilai
            $table->dropForeign('pelajars_pensyarah_penilai_id_foreign');
            
            // Pensyarah penilai ojt
            $table->dropForeign('pelajars_pensyarah_penilai_ojt_id_foreign');

            // Penyelaras program
            $table->dropForeign("pelajars_penyelaras_program_id_foreign");
        });
    }
};
