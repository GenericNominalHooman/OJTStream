<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Models\Kupli;
use App\Models\Pelajar;
use App\Models\KetuaProgramJabatan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function kupli_user_can_authenticate_using_username_and_password()
    {
        // Arrange
        $user = User::factory()->create();
        $kupli = Kupli::factory()->create(['user_id' => $user->id]);
        dd($user->Kupli);

        Livewire::test('auth.login', ['login_type' => 'streamlined'])
            ->set('username_input', $user->username)
            ->set('password', 'password')
            ->call('store');

        // Assert
        $this->assertTrue(auth()->check());
        $this->assertTrue(auth()->user()->is($user));
    }

    /** @test */
    public function pelajar_user_can_authenticate_using_username_and_password()
    {
        // Arrange
        $user = User::factory()->create();
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);

        Livewire::test('auth.login', ['login_type' => 'streamlined'])
            ->set('username_input', $user->username)
            ->set('password', 'password')
            ->call('store');

        // Assert
        $this->assertTrue(auth()->check());
        $this->assertTrue(auth()->user()->is($user));
    }

    /** @test */
    public function ketua_program_jabatan_user_can_authenticate_using_username_and_password()
    {
        // Arrange
        $user = User::factory()->create();
        // $ketuaProgramJabatan = KetuaProgramJabatan::factory()->create(['user_id' => $user->id]);

        Livewire::test('auth.login', ['login_type' => 'streamlined'])
            ->set('username_input', $user->username)
            ->set('password', 'password')
            ->call('store');

        // Assert
        $this->assertTrue(auth()->check());
        $this->assertTrue(auth()->user()->is($user));
    }

    /** @test */
    public function user_cannot_authenticate_with_invalid_username()
    {
        // Arrange
        User::factory()->create();

        Livewire::test('auth.login', ['login_type' => 'streamlined'])
            ->set('username_input', 'invalid-username')
            ->set('password', 'password')
            ->call('store')
            ->assertHasNoErrors(['username_input', 'password'])
            ->assertSet('status', 'Username yang dimasukkan tidak wujud');

        // Assert
        $this->assertFalse(auth()->check());
    }
}