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
            $table->bigInteger("janji_temu_1")->unsigned()->nullable();
            $table->foreign("janji_temu_1")->references("id")->on("janji_temus_pelajars")->onDelete("cascade");
            $table->bigInteger("janji_temu_2")->unsigned()->nullable();
            $table->foreign("janji_temu_2")->references("id")->on("janji_temus_pelajars")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelajars', function (Blueprint $table) {
            $table->dropForeign("pelajars_janji_temu_1_foreign");
            $table->dropForeign("pelajars_janji_temu_2_foreign");
        });
    }
};
