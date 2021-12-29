<?php

namespace Eskiell\FocusPermission\Commands;

use Eskiell\FocusPermission\Models\Permission;
use Eskiell\FocusPermission\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class PermissionsGenerate extends Command
{
    protected $signature = 'permissions:generate {--fresh}';
    protected $description = 'Generates permissions based on your routes';

    public function handle()
    {
        $options = $this->options();
        if ($options['fresh']) {
            Permission::query()->delete();
            Role::query()->delete();
        }
        foreach (Route::getRoutes()->getIterator() as $route) {
            if (str_contains($route->uri, 'api')) {
                $permissions = ['name' => $route->getName(), 'action' => $route->getActionName(), 'method' => $route->getActionMethod()];
                $permission = Permission::updateOrCreate($permissions);
                $this->roles($route, $permission);
            }
        }
    }

    private function roles($route, $permission)
    {
        foreach ($route->middleware() as $role) {
            $this->createRoles($permission, $role);
        }
    }

    private function createRoles($permission, $role)
    {
        $role = Role::firstOrCreate(['name' => $role, 'description' => 'Generates permissions based on routes']);
        $role->permissions()->syncWithoutDetaching($permission->id);
    }
}