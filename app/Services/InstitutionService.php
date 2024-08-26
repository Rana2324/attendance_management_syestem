<?php

namespace App\Services;

use App\Models\Institution;

class InstitutionService
{
    public function createInstitution(array $data)
    {
        return Institution::create([
            "name" => $data["institutionName"],
        ]);
    }

    public function getAllInstitutions()
    {
        return Institution::all();
    }

    public function getInstitutionById($id)
    {
        try {
            return Institution::findOrFail($id);
        } catch (\Exception $ex) {
            throw new \Exception("Institution not found for ID " . $id);
        }
    }

    public function updateInstitution($id, array $data)
    {
        try {
            $institution = $this->getInstitutionById($id);
            $institution->update([
                "name" => $data["institutionName"],
            ]);
            return $institution;
        } catch (\Exception $ex) {
            throw new \Exception(
                "Failed to update institution: " . $ex->getMessage()
            );
        }
    }

    public function deleteInstitution($id)
    {
        try {
            $institution = $this->getInstitutionById($id);
            $institution->delete();
        } catch (\Exception $ex) {
            throw new \Exception(
                "Failed to delete institution: " . $ex->getMessage()
            );
        }
    }
}
