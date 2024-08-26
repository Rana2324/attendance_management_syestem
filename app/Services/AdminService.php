<?php
namespace App\Services;

use App\Models\InstitutionAdmin;

class AdminService
{

    public function createAdmin( array $data )
    {
        $password = $this->generateEncryptedRandomPassword();
        $institutionAdmin = InstitutionAdmin::create( [
            'name'           => $data['name'],
            'email'          => $data['email'],
            'institution_id' => $data['institution_id'],
            'password'       => bcrypt($password),
        ] );

        EmailService::sendCreationMailToAdmin($institutionAdmin,$password);

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
