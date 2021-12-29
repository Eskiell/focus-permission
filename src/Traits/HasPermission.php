<?php


namespace Eskiell\FocusPermission\Traits;


use Eskiell\FocusPermission\Models\Permission;

trait HasPermission
{
    public function roles()
    {
        return $this->belongsToMany(
            config('focus-permission.models.role'),
            config('focus-permission.table_names.users_roles'),
        );

    }
    public function permissions()
    {
        return $this->belongsToMany(
            config('focus-permission.models.permission'),
            config('focus-permission.table_names.users_permissions'),
        );

    }

}