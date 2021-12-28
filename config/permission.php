<?php
return [
    'models' => [
        'permission' => Eskiell\FocusPermission\Models\Permission::class,
        'role' => Eskiell\FocusPermission\Models\Role::class,

    ],
    'table_names' => [
        'permission' => 'permission',
        'role' => 'role',
        'role_has_permissions' => 'roles_permissions',
        'users_roles' => 'users_roles',
        'users_permissions' => 'users_permissions',
    ],
];