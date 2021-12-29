<?php

namespace Eskiell\FocusPermission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eskiell\FocusPermission\Contracts\Permission as PermissionContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\Types\Boolean;

class Permission extends Model implements PermissionContract
{
    use HasFactory;

    protected $fillable = ['name', 'action', 'method', 'editable'];
    protected $casts = ['name' => 'string', 'action' => 'string', 'method' => 'string', 'is_editable' => 'boolean'];

    public function getTable()
    {
        return config('focus-permission.table_names.permissions', parent::getTable());
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('focus-permission.models.role'),
            config('focus-permission.table_names.role_has_permissions')
        );
    }
}
