<?php

namespace Asiifdev\EasyRole\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Role
{
    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany;

    /**
     * Find a role by its name and guard name.
     *
     * @param  string|null  $guardName
     * @return \Asiifdev\EasyRole\Contracts\Role
     *
     * @throws \Asiifdev\EasyRole\Exceptions\RoleDoesNotExist
     */
    public static function findByName(string $name, $guardName): self;

    /**
     * Find a role by its id and guard name.
     *
     * @param  string|null  $guardName
     * @return \Asiifdev\EasyRole\Contracts\Role
     *
     * @throws \Asiifdev\EasyRole\Exceptions\RoleDoesNotExist
     */
    public static function findById(int $id, $guardName): self;

    /**
     * Find or create a role by its name and guard name.
     *
     * @param  string|null  $guardName
     * @return \Asiifdev\EasyRole\Contracts\Role
     */
    public static function findOrCreate(string $name, $guardName): self;

    /**
     * Determine if the user may perform the given permission.
     *
     * @param  string|\Asiifdev\EasyRole\Contracts\Permission  $permission
     */
    public function hasPermissionTo($permission): bool;
}
