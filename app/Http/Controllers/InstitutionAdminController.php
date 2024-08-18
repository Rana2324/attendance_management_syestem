<?php
namespace App\Http\Controllers;

use App\Services\InstitutionService;
use Illuminate\Http\Request;

class InstitutionAdminController
{
    protected $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    public function storeInstitution(Request $request)
    {
        try {
            $data = $request->all();

            $institution = $this->institutionService->createInstitution($data);
            return sendSuccessResponse("Institution created successfully", $institution, 201);
        } catch (\Exception $ex) {
            return sendErrorResponse("Failed to create institution: " . $ex->getMessage());
        }
    }

    public function listInstitutions()
    {
        try {
            $institutions = $this->institutionService->getAllInstitutions();
            return sendSuccessResponse("Retrieved all institutions successfully", $institutions, 200);
        } catch (\Exception $ex) {
            return sendErrorResponse("Failed to retrieve institutions: " . $ex->getMessage());
        }
    }

    public function showInstitution($id)
    {
        try {
            $institution = $this->institutionService->getInstitutionById($id);
            return sendSuccessResponse("Retrieved institution successfully", $institution, 200);
        } catch (\Exception $ex) {
            return sendErrorResponse("Failed to retrieve institution: " . $ex->getMessage());
        }
    }

    public function updateInstitution(Request $request, $id)
    {
        try {
            $data = $request->all();

            $institution = $this->institutionService->updateInstitution($id, $data);
            return sendSuccessResponse("Institution updated successfully", $institution, 200);
        } catch (\Exception $ex) {
            return sendErrorResponse("Failed to update institution: " . $ex->getMessage());
        }
    }

    public function deleteInstitution($id)
    {
        try {
            $this->institutionService->deleteInstitution($id);
            return sendSuccessResponse("Institution deleted successfully");
        } catch (\Exception $ex) {
            return sendErrorResponse("Failed to delete institution: " . $ex->getMessage());
        }
    }
}
