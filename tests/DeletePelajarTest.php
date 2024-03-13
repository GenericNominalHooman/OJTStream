<?php

namespace Tests\Feature\Http\Livewire\Kupli;
// namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Company;
use App\Models\Pelajar;
use App\Models\PelajarsCompany;
use App\Http\Livewire\Kupli\SuntingPelajar;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePelajarTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_update_pelajar_profile()
    {
        $this->seed();
    
        $user = User::factory()->create();
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);
        $company = Company::factory()->create();
    
        $pelajarCompany = PelajarsCompany::create([
            'pelajar_id' => $pelajar->id,
            'company_id' => $company->id,
            'role' => 'Example Role',
        ]);
    
        Livewire::test(SuntingPelajar::class, ['pelajar' => $pelajar])
            ->set('user.name', 'Updated Name')
            ->set('pelajar.nric_number', '123456789012')
            ->set('pelajar_company.role', 'Updated Role')
            ->call('update')
            ->assertHasNoErrors();
    
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    
        $this->assertDatabaseHas('pelajars', [
            'id' => $pelajar->id,
            'nric_number' => '123456789012',
        ]);
    
        $this->assertDatabaseHas('pelajars_companies', [
            'pelajar_id' => $pelajar->id,
            'company_id' => $company->id,
            'role' => 'Updated Role',
        ]);
    }}