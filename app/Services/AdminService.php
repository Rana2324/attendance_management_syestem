<?php
namespace App\Services;

use App\Models\InstitutionAdmin;

class AdminService
{

    public function createAdmin( array $data )
    {
        return InstitutionAdmin::create( [
            'name'           => $data['name'],
            'email'          => $data['email'],
            'institution_id' => $data['institution_id'],
            'password'       => $data['password'],
        ] );
    }

    public function getAllAdmins()
    {
        return InstitutionAdmin::with( 'institution' )->get();
    }

    public function getAdminById( $id )
    {
        try {
            return InstitutionAdmin::findOrFail( $id );
        } catch ( \Exception $ex ) {
            throw new \Exception( "Institution Admin not found for ID " . $id );
        }
    }

    public function updateAdmin( $id, array $data )
    {
        $admin = $this->getAdminById( $id );

        $admin->update( [
            'name'           => $data['name'],
            'email'          => $data['email'],
            'institution_id' => $data['institution_id'],
            'password'       => $data['password'] ? $data['password'] : $admin->password,
        ] );

        return $admin;
    }

    public function deleteAdmin( $id )
    {
        $admin = $this->getAdminById( $id );
        $admin->delete();
    }
}
