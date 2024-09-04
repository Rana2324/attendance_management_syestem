<?php

namespace Tests\Feature;

use App\Models\Institution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstitutionTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreInstitution()
    {
        $data = [
            "institutionName" => "Test Institution",
        ];

        $response = $this->postJson( "/api/institutions", $data );

        $response->assertStatus( 201 )->assertJson( [
            "message" => "Institution created successfully",
            "data"    => ["name" => "Test Institution"],
        ] );

        $this->assertDatabaseHas( "institutions", [
            "name" => "Test Institution",
        ] );
    }

    public function testListInstitutions()
    {
        $response = $this->get( "/api/institutions" );

        $response->assertStatus( 200 );
    }

    public function testShowInstitution()
    {
        $institution = Institution::factory()->create();

        $response = $this->getJson( "/api/institutions/{$institution->id}" );

        $response->assertStatus( 200 )->assertJson( [
            "message" => "Retrieved institution successfully",
            "data"    => ["name" => $institution->name],
        ] );
    }

    public function testUpdateInstitution()
    {
        $institution = Institution::factory()->create();

        $data = [
            "institutionName" => "Updated Institution Name",
        ];

        $response = $this->putJson(
            "/api/institutions/{$institution->id}",
            $data
        );

        $response->assertStatus( 200 )->assertJson( [
            "message" => "Institution updated successfully",
            "data"    => ["name" => "Updated Institution Name"],
        ] );

        $this->assertDatabaseHas( "institutions", [
            "name" => "Updated Institution Name",
        ] );
    }

    public function testDeleteInstitution()
    {
        $institution = Institution::factory()->create();

        $response = $this->deleteJson( "/api/institutions/{$institution->id}" );

        $response->assertStatus( 200 )->assertJson( [
            "message" => "Institution deleted successfully",
        ] );

        $this->assertDatabaseMissing( "institutions", [
            "id" => $institution->id,
        ] );
    }
}
