<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    /**
     * Default Permissions of the Application.
     */
    public static function defaultPermissions()
    {
        return [
            'view_backend',
            'edit_settings',
            'view_logs',
            'view_services',

            'view_users',
            'add_users',
            'edit_users',
            'edit_users_permissions',
            'delete_users',
            'restore_users',
            'block_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',
            'restore_roles',

            'view_backups',
            'add_backups',
            'create_backups',
            'download_backups',
            'delete_backups',

            'view_hotels',
            'add_hotels',
            'edit_hotels',
            'delete_hotels',
            'restore_hotels',
            'block_hotels',

            'view_cars',
            'add_cars',
            'edit_cars',
            'delete_cars',
            'restore_cars',
            'block_cars',

            'view_tours',
            'add_tours',
            'edit_tours',
            'delete_tours',
            'restore_tours',
            'block_tours',

            'view_cruises',
            'add_cruises',
            'edit_cruises',
            'delete_cruises',
            'restore_cruises',
            'block_cruises',

            'view_villas',
            'add_villas',
            'edit_villas',
            'delete_villas',
            'restore_villas',
            'block_villas',
        ];
    }

    /**
     * Name should be lowercase.
     *
     * @param  string  $value  Name value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
