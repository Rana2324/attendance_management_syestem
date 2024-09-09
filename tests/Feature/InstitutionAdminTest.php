<?php

namespace Tests\Feature;

use App\Models\Institution;
use App\Models\InstitutionAdmin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstitutionAdminTest extends TestCase
{
    use RefreshDatabase;
    public function testStoreAdminInstitution()
    {
        // Create an institution to assign to the admin
        $institution = Institution::factory()->create();

        // Mock request data
        $data = [
            "name"           => "Admin Name",
            "email"          => "admin@example.com",
            "institution_id" => $institution->id,
        ];

        // Send POST request to create an admin
        $response = $this->postJson( "/api/institution-admin", $data );

        // Assert the response status and structure
        $response->assertStatus( 201 )
                 ->assertJson( [
                     "success" => true,
                     "message" => "Admin created successfully",
                     "data"    => [
                         "name"  => $data['name'],
                         "email" => $data['email'],
                     ],
                 ] );

        // Assert the database has the new admin record
        $this->assertDatabaseHas( "institution_admins", [
            "name"           => "Admin Name",
            "email"          => "admin@example.com",
            "institution_id" => $institution->id,
        ] );
    }
    public function testListInstitutionAdmins()
    {
        // Create a few admins
        InstitutionAdmin::factory()->count( 3 )->create();

        // Send GET request to list admins
        $response = $this->getJson( "/api/institution-admin" );

        // Assert the response status
        $response->assertStatus( 200 )
                 ->assertJsonStructure( [
                     "message",
                     "data" => [
                         '*' => ["name", "email", "institution_id"],
                     ],
                 ] );
    }
    public function testShowInstitutionAdmin()
    {
        $InstitutionAdmin = InstitutionAdmin::factory()->create();

        $response = $this->getJson( "/api/institution-admin/{$InstitutionAdmin->id}" );

        $response->assertStatus( 200 )
                 ->assertJson( [
                     "message" => "Retrieved Admin successfully",
                     "data"    => [
                         "name"  => $InstitutionAdmin->name,
                         "email" => $InstitutionAdmin->email,
                     ],
                 ] );
    }
    public function testUpdateAdminInstitution()
    {
        // Create an admin
        $InstitutionAdmin = InstitutionAdmin::factory()->create();

        // Mock update data
        $data = [
            "name"  => "Updated Admin Name",
            "email" => "updated_admin@example.com",
        ];

        // Send PUT request to update the admin
        $response = $this->putJson( "/api/institution-admin/{$InstitutionAdmin->id}", $data );

        // Assert the response status and structure
        $response->assertStatus( 200 )
                 ->assertJson( [
                     "message" => "Admin updated successfully",
                     "data"    => [
                         "name"  => $data['name'],
                         "email" => $data['email'],
                     ],
                 ] );

        // Assert the database has the updated admin record
        $this->assertDatabaseHas( "institution_admins", [
            "name"  => "Updated Admin Name",
            "email" => "updated_admin@example.com",
        ] );
    }
    public function testDeleteAdminInstitution()
    {
        // Create an admin
        $InstitutionAdmin = InstitutionAdmin::factory()->create();

        // Send DELETE request to remove the admin
        $response = $this->deleteJson( "/api/institution-admin/{$InstitutionAdmin->id}" );

        // Assert the response status and structure
        $response->assertStatus( 200 )
                 ->assertJson( [
                     "message" => "Admin deleted successfully",
                 ] );

        // Assert the admin is no longer in the database
        $this->assertDatabaseMissing( "institution_admins", [
            "id" => $InstitutionAdmin->id,
        ] );
    }
};
