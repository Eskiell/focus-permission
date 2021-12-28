<?php

namespace Eskiell\FocusPermission;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eskiell\FocusPermission\Skeleton\SkeletonClass
 */
class FocusPermissionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'focusPermission';
    }
}
