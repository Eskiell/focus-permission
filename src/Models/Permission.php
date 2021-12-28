<?php

namespace Eskiell\FocusPermission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eskiell\FocusPermission\Contracts\Permission as PermissionContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model implements PermissionContract
{
    use HasFactory;

    public function getTable()
    {
        return config('permission.table_names.permission', parent::getTable());
    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.role_has_permissions')
        );
    }
}
