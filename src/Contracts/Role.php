<?php


namespace Eskiell\FocusPermission\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
interface Role
{
    public function permissions(): BelongsToMany;
}