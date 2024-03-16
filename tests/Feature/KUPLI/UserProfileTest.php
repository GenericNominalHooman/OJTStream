<?php

namespace Tests\Feature\KUPLI;

use App\Models\Kupli;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Pelajar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    /**
     * This test ensures that the updatePassword method fails validation
     * when an incorrect old password is provided.
     */    
    public function test_update_password_validates_old_password(){
        $kupli_user = User::factory()->create(['password' => 'old-password']);
        $kupli = Kupli::factory()->create(["user_id" => $kupli_user->id]);

        Livewire::actingAs($kupli_user)
            ->test('kupli.user-profile')
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
        $kupli_user = User::factory()->create(['password' => 'old-password']);
        $kupli = Kupli::factory()->create(["user_id" => $kupli_user->id]);

        Livewire::actingAs($kupli_user)
            ->test('kupli.user-profile')
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
        $kupli_user = User::factory()->create(['password' => 'old-password']);
        $kupli = Kupli::factory()->create(["user_id" => $kupli_user->id]);

        Livewire::actingAs($kupli_user)
            ->test('kupli.user-profile')
            ->set('old_password', 'old-password')
            ->set('new_password', 'new-password')
            ->set('new_password_confirmation', 'new-password')
            ->call('updatePassword')
            ->assertHasNoErrors();

        $this->assertTrue(Hash::check('new-password', $kupli_user->fresh()->password));
    }

    /**
     * This test ensures that the updatePassword method does not update
     * the user's password if the new password is the same as the current password.
     */
    public function test_update_password_does_not_update_password_if_new_password_is_same_as_current()
    {
        $kupli_user = User::factory()->create(['password' => 'old-password']);
        $kupli = Kupli::factory()->create(["user_id" => $kupli_user->id]);

        Livewire::actingAs($kupli_user)
            ->test('kupli.user-profile')
            ->set('old_password', 'old-password')
            ->set('new_password', 'old-password')
            ->set('new_password_confirmation', 'old-password')
            ->call('updatePassword')
            ->assertHasErrors(['new_password']);

        $this->assertTrue(Hash::check('old-password', $kupli_user->fresh()->password));
    }
}
