<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Pelajar;
use App\Models\PelajarsCompany;
use App\Models\Company;
use App\Models\SkopKerja;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $pelajar;
    protected $pelajarsCompany;
    protected $company;
    protected $skopKerja;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);

        // Create a user
        $this->user = User::factory()->create();

        // Create a Pelajar related to the user
        $this->pelajar = Pelajar::factory()->create([
            'user_id' => $this->user->id,
            'semester' => 1,
            'company_id' => 1,
        ]);

        // Create a PelajarsCompany related to the Pelajar
        $this->pelajarsCompany = PelajarsCompany::factory()->create(['pelajar_id' => $this->pelajar->user_id]);

        // Create a Company related to the PelajarsCompany
        $this->company = Company::factory()->create();

        // Create a SkopKerja related to the Pelajar
        $this->skopKerja = SkopKerja::factory()->create(['pelajar_id' => $this->pelajar->user_id]);
    }

    public function testUpdateUserProfile()
    {
        // Log in the user
        $this->actingAs($this->user);

        // Prepare the data to be sent to the update method
        $data = [
            'user' => [
                'name' => 'Updated Name',
                'email' => 'updated@email.com',
                'phone' => '1234567890',
                'gender' => 'Male',
                'location' => 'Updated Location',
            ],
            'pelajar' => [
                'nric_number' => '123456789012',
                'guardian' => 'Updated Guardian',
                'guardian_telephone_number' => '0987654321',
                'linkedin_url' => 'https://www.linkedin.com/in/updated',
                'facebook_url' => 'https://www.facebook.com/updated',
                'github_url' => 'https://github.com/updated',
                'program' => 'SVM',
                'heart_disease' => 'No',
                'asthma' => 'No',
                'diabetes' => 'No',
                'osteoporosis' => 'No',
                'slipped_disc' => 'No',
                'matrix_number' => '123456',
                'semester' => '1',
                'cohort' => '2023',
            ],
            'skop_kerja_input' => UploadedFile::fake()->create('job_description.pdf',  100),
            'company' => [
                'comp_type' => 'Updated Company Type',
                'comp_name' => 'Updated Company Name',
                'comp_address_street' => 'Updated Street',
                'comp_address_city' => 'Updated City',
                'comp_address_province' => 'Updated Province',
                'comp_contact' => 'Updated Contact',
                'ojt_supervisor' => 'Updated Supervisor',
                'students_deployed_count' => '10',
                'comp_email' => 'updated@company.com',
            ],
            'pelajars_company' => [
                'role' => 'Updated Role',
            ],
        ];

        // Call the update method
        $response = $this->post(route('user-profile.update'), $data);

        // Assert that the response is a redirect
        $response->assertRedirect();

        // Assert that the user's profile was updated
        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Updated Name',
            'email' => 'updated@email.com',
        ]);

        // Assert that the Pelajar's profile was updated
        $this->assertDatabaseHas('pelajars', [
            'user_id' => $this->user->id,
            'nric_number' => '123456789012',
            'guardian' => 'Updated Guardian',
            // ... other fields to check
        ]);

        // Assert that the SkopKerja's document was updated
        $this->assertDatabaseHas('skop_kerjas', [
            'pelajar_id' => $this->pelajar->user_id,
            'document_name' => 'job_description.pdf',
            // ... other fields to check
        ]);

        // Assert that the Company's details were updated
        $this->assertDatabaseHas('companies', [
            'id' => $this->company->id,
            'comp_type' => 'Updated Company Type',
            'comp_name' => 'Updated Company Name',
            // ... other fields to check
        ]);

        // Assert that the PelajarsCompany's role was updated
        $this->assertDatabaseHas('pelajars_companies', [
            'pelajar_id' => $this->pelajar->user_id,
            'role' => 'Updated Role',
        ]);
    }
}