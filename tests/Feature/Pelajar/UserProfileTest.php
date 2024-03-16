<?php

namespace Tests\Feature\Livewire\OJTStream;

use App\Models\User;
use App\Models\Pelajar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * This test ensures that the updatePassword method fails validation
     * when an incorrect old password is provided.
     */    
    public function test_update_password_validates_old_password(){
        $user = User::factory()->create(['password' => 'old-password']);
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('o-j-t-stream.user-profile')
            ->set('old_password', 'wrong-password')
            ->set('new_password', 'new-password')
            ->set('new_password_confirmation', 'new-password')
            ->call('updatePassword')
            ->assertHasErrors(['old_password']);
    }

    /**
     * This test ensures that the updatePassword method fails validation
     * when the new password confirmation does not match the new password.
     */
    public function test_update_password_validates_new_password_confirmation()
    {
        $user = User::factory()->create(['password' => 'old-password']);
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('o-j-t-stream.user-profile')
            ->set('old_password', 'old-password')
            ->set('new_password', 'new-password')
            ->set('new_password_confirmation', 'different-password')
            ->call('updatePassword')
            ->assertHasErrors(['new_password']);
    }

    /**
     * This test ensures that the updatePassword method successfully updates
     * the user's password when valid inputs are provided.
     */
    public function test_update_password_updates_password()
    {
        $user = User::factory()->create(['password' => 'old-password']);
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('o-j-t-stream.user-profile')
            ->set('old_password', 'old-password')
            ->set('new_password', 'new-password')
            ->set('new_password_confirmation', 'new-password')
            ->call('updatePassword')
            ->assertHasNoErrors();

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    /**
     * This test ensures that the updatePassword method does not update
     * the user's password if the new password is the same as the current password.
     */
    public function test_update_password_does_not_update_password_if_new_password_is_same_as_current()
    {
        $user = User::factory()->create(['password' => 'old-password']);
        $pelajar = Pelajar::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('o-j-t-stream.user-profile')
            ->set('old_password', 'old-password')
            ->set('new_password', 'old-password')
            ->set('new_password_confirmation', 'old-password')
            ->call('updatePassword')
            ->assertHasErrors(['new_password']);

        $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
    }
}