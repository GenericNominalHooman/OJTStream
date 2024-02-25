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
            $table->bigInteger("skop_kerja_id")->unsigned()->nullable(true);
            $table->foreign("skop_kerja_id")->references("id")->on("skop_kerjas")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelajars', function (Blueprint $table) {
            $table->dropForeign("pelajars_skop_kerja_id_foreign");
        });
    }
};
