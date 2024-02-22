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
        Schema::create('janji_temus_pelajars', function (Blueprint $table) {
            // $table->id();
            // $table->bigInteger("pelajar_id")->unsigned();
            // $table->foreign('pelajar_id')->references('user_id')->on('pelajars')->onDelete('cascade');
            // $table->bigInteger("pensyarah_penilai_ojt_id")->unsigned();
            // $table->foreign('pensyarah_penilai_ojt_id')->references('id')->on('pensyarah_penilai_ojts')->onDelete('cascade');
            // $table->enum("visit_type", ["Lawatan PPO 1", "Lawatan PPO 2"])->nullable(false);
            // $table->dateTime("visit_at")->nullable(false);

            // $table->timestamps();

            $table->id();
            $table->bigInteger("pelajar_id")->unsigned();
            $table->foreign('pelajar_id')->references('user_id')->on('pelajars')->onDelete('cascade');
            $table->bigInteger("janji_temu_id")->unsigned();
            $table->foreign('janji_temu_id')->references('id')->on('janji_temus')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_temus_pelajars');
    }
};
