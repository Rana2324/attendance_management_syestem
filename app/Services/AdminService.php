<?php
namespace App\Services;

use App\Models\InstitutionAdmin;
use App\Models\Role;
use App\Models\User;

class AdminService
{

    public function createAdmin( array $data )
    {

        $password    = $this->generateEncryptedRandomPassword();
        $adminRollId = Role::where( 'name', Role::ADMIN )->latest()->first();

        $user = User::create( [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt( $password ),
            'role_id'  => $adminRollId->id,
        ] );

        $institutionAdmin = InstitutionAdmin::create( [
            'institution_id' => $data['institution_id'],
            'user_id'        => $user->id,
        ] );

        EmailService::sendCreationMailToAdmin( $institutionAdmin, $password );
        return $user;
    }

    public function getAllAdmins()
    {
        return InstitutionAdmin::with( 'institution', 'user' )->get();

    }

    public function getAdminById( $id )
    {
        try {
            return InstitutionAdmin::with( 'institution', 'user' )->findOrFail( $id );
        } catch ( \Exception $ex ) {
            throw new \Exception( "Institution Admin not found for ID " . $id );
        }
    }

    public function updateAdmin( $id, array $data )
    {
        // Find the user or throw an exception if not found
        $institutionAdmin = $this->getAdminById( $id );

        // Update the user data
        $institutionAdmin->user->update( [
            'name'  => $data['name'],
            'email' => $data['email'],

        ] );
        $institutionAdmin = $institutionAdmin->update( [
            'institution_id' => $data['institution_id'],
        ] );
        return $institutionAdmin;
    }

    public function deleteAdmin( $id )
    {
        $admin = $this->getAdminById( $id );
        $admin->delete();
    }

    private function generateEncryptedRandomPassword( $length = 12 )
    {
        // Define the characters to use in the password
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';

        // Get the length of the characters string
        $charactersLength = strlen( $characters );

        // Initialize the password variable
        $randomPassword = '';

        // Generate the password
        for ( $i = 0; $i < $length; $i++ ) {
            $randomPassword .= $characters[rand( 0, $charactersLength - 1 )];
        }

        return $randomPassword;
    }
}
