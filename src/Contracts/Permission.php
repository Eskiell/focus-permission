<?php


namespace Eskiell\FocusPermission\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Permission
{
    public function roles(): BelongsToMany;
}