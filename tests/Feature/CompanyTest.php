<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_redirect_to_login_page_if_not_authorized_on_visiting_company_page()
    {
        $response = $this->get('/company');
        $response->assertRedirect('/login');
    }

    public function test_visit_companies_page_successfully()
    {
        $response = $this->actingAs($this->user)->get('/company');
        $response->assertSuccessful();
    }

    public function test_create_company_gives_us_validation_errors_when_input_is_not_provided()
    {
        $response = $this->actingAs($this->user)->post('/company/store', []);
        $response->assertSessionHasErrors(['title', 'logo', 'address', 'founded_at']);
    }

    public function test_logo_is_created_in_storage_when_creating_a_company()
    {
        Storage::fake('public');

        $data = [
            'title' => 'Redberry',
            'logo' => UploadedFile::fake()->image('redberry.png'),
            'address' => 'Sairme Street N65',
            'founded_at' => now()->subYears(8),
        ];

       $response = $this->actingAs($this->user)->post('/company/store', $data);
       $response->assertCreated();
       $logoAddress = Company::first()->logo;
       $splitLogo = explode('/', $logoAddress);
       $logoFileName = end($splitLogo);
       Storage::disk('public')->assertExists('/company/'. $logoFileName);
    }

    public function test_company_create_gives_us_validation_errors_when_input_is_provided_partial()
    {
        Storage::fake('public');

        $data = [
            'title' => 'Redberry',
            'logo' => UploadedFile::fake()->image('redberry.png'),
        ];

        $response = $this->actingAs($this->user)->post('/company/store', $data);
        $response->assertSessionHasErrors(['address', 'founded_at']);
    }
}
