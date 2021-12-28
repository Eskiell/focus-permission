<?php


namespace Eskiell\FocusPermission\Traits;


use Eskiell\FocusPermission\Models\Permission;

trait HasPermission
{
    public function roles()
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.users_roles'),
        );

    }
    public function permissions()
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.users_permissions'),
        );

    }

}