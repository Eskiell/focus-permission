<?php


namespace Eskiell\FocusPermission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Eskiell\FocusPermission\Contracts\Role as RoleContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model implements RoleContract
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    protected $casts = ['name' => 'string', 'description' => 'string'];

    public function getTable()
    {
        return config('focus-permission.table_names.roles', parent::getTable());
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('focus-permission.models.permission'),
            config('focus-permission.table_names.role_has_permissions'),
        );
    }
}