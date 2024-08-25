<?php
namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;

class InstitutionAdminController
{
    protected $adminService;

    public function __construct( AdminService $adminService )
    {
        $this->adminService = $adminService;
    }
    //admin part start here
    public function storeAdmin( Request $request )
    {
        try {
            $data = $request->all();

            $admin = $this->adminService->createAdmin( $data );
            return sendSuccessResponse( "Admin created successfully", $admin, 201 );
        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Failed to create Admin: " . $ex->getMessage() );
        }
    }

    public function adminList()
    {
        try {
            $admins = $this->adminService->getAllAdmins();
            return sendSuccessResponse( "Retrieved all Admins successfully", $admins, 200 );
        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Failed to retrieve Admins: " . $ex->getMessage() );
        }
    }

    public function showAdmin( $id )
    {
        try {
            $admin = $this->adminService->getAdminById( $id );
            return sendSuccessResponse( "Retrieved Admin successfully", $admin, 200 );
        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Failed to retrieve Admin: " . $ex->getMessage() );
        }
    }

    public function updateAdmin( Request $request, $id )
    {
        try {
            $data = $request->all();

            $admin = $this->adminService->updateAdmin( $id, $data );
            return sendSuccessResponse( "Admin updated successfully", $admin, 200 );
        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Failed to update Admin: " . $ex->getMessage() );
        }
    }

    public function deleteAdmin( $id )
    {
        try {
            $this->adminService->deleteAdmin( $id );
            return sendSuccessResponse( "Admin deleted successfully" );
        } catch ( \Exception $ex ) {
            return sendErrorResponse( "Failed to delete Admin: " . $ex->getMessage() );
        }
    }

}
