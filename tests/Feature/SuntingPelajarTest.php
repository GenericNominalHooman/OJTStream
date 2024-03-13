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
        $user = User::factory()->create();
        $pelajar = Pelajar::factory()->create([
            'user_id' => $user->id,
            'matrix_number' => "AKV0222KA001",
        ]);
        
        Livewire::test(SuntingPelajar::class, ['pelajar' => $pelajar])
            ->call('deletePelajar')
            ->assertRedirect(route('kupli senarai pelajar'));

        $this->assertDatabaseMissing('pelajars', [
            'user_id' => $pelajar->user_id,
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}