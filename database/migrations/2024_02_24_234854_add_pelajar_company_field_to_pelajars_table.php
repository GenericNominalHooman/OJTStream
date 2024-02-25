<?php

use App\Models\PelajarsCompany;
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
            $table->bigInteger('pelajar_company_id')->unsigned()->nullable(true);
            $table->foreign("pelajar_company_id")->references("id")->on("pelajars_companies")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelajars', function (Blueprint $table) {
            $table->dropForeign("pelajars_pelajar_company_id_foreign");
        });
    }
};
