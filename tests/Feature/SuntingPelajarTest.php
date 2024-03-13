<?php

namespace Tests\Feature\Http\Livewire\Kupli;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Company;
use App\Models\Pelajar;
use App\Models\JanjiTemu;
use App\Models\SkopKerja;
use App\Models\PelajarsCompany;
use App\Models\JanjiTemuPelajar;
use App\Models\DokumenOJTPelajar;
use App\Models\JanjiTemusPelajar;
use App\Http\Livewire\Kupli\SuntingPelajar;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuntingPelajarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_pelajar()
    {
        $this->seed();

        // DEFINE PELAJAR AND SKOP KERJA PELAJAR
        $skopKerja = SkopKerja::factory()->create();
        $user = User::factory()->create();
        $pelajar = Pelajar::factory()->create([
            'user_id' => $user->id,
            'skop_kerja_id' => $skopKerja->id,
        ]);
        
        // DEFINE COMPANY PELAJAR
        $company = Company::factory()->create();
        $pelajarCompany = PelajarsCompany::factory()->create([
            'pelajar_id' => $pelajar->user_id,
            'company_id' => $company->id,
        ]);
        $pelajar->pelajar_company_id = $pelajarCompany;

        // DEFINE JANJI TEMU PELAJAR
        $janjiTemu = JanjiTemu::factory()->create();
        $janjiTemuPelajar = JanjiTemusPelajar::factory()->create([
            'pelajar_id' => $pelajar->user_id,
            'janji_temu_id' => $janjiTemu->id,
        ]);
        $pelajar->janji_temu_1 = $janjiTemuPelajar->id;
        
        // 
        $dokumenOJTPelajar = DokumenOJTPelajar::factory()->create([
            'pelajar_id' => $pelajar->user_id,
        ]);

        Livewire::test(SuntingPelajar::class, ['pelajar' => $pelajar])
            ->call('deletePelajar')
            ->assertRedirect(route('kupli senarai pelajar'));

        $this->assertDatabaseMissing('pelajars', [
            'id' => $pelajar->user_id,
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseMissing('pelajars_companies', [
            'pelajar_id' => $pelajar->user_id,
        ]);

        $this->assertDatabaseMissing('skop_kerjas', [
            'pelajar_id' => $pelajar->user_id,
        ]);

        $this->assertDatabaseMissing('janji_temu_pelajars', [
            'pelajar_id' => $pelajar->user_id,
        ]);

        $this->assertDatabaseMissing('dokumen_ojt_pelajars', [
            'pelajar_id' => $pelajar->user_id,
        ]);
    }
}