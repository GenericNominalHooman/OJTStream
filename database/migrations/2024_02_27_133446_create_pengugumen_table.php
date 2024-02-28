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
        Schema::create('pengugumen', function (Blueprint $table) {
            $table->id();
            $table->text("tajuk")->nullable(false);
            $table->text("penguguman")->nullable(false);
            $table->bigInteger("kupli_id")->unsigned()->nullable(false);
            $table->foreign("kupli_id")->references("id")->on("kuplis")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengugumen');
    }
};
