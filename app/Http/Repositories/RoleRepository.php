<?php

namespace App\Http\Repositories;

use App\Models\Department;
use App\Models\Role;

class RoleRepository
{
    /**
     * Get list permission
     *
     * @param string $userId
     * @return array
     */
    public function getPermissions(string $userId)
    {
        $role = new Role();
        $result = $role->where('id', $userId)->get();
        return $result;
    }
}
