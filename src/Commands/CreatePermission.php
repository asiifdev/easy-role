<?php

namespace Asiifdev\EasyRole\Commands;

use Asiifdev\EasyRole\Contracts\Permission as PermissionContract;
use Illuminate\Console\Command;

class CreatePermission extends Command
{
    protected $signature = 'easy-role:buat-permission 
                {name : The name of the permission} 
                {guard? : The name of the guard}';

    protected $description = 'Create a permission';

    public function handle()
    {
        $permissionClass = app(PermissionContract::class);

        $permission = $permissionClass::findOrCreate($this->argument('name'), $this->argument('guard'));

        $this->info("Permission `{$permission->name}` ".($permission->wasRecentlyCreated ? 'created' : 'already exists'));
    }
}
