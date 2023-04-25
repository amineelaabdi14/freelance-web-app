<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        Permission::create(['name'=> 'read_services']);
        Permission::create(['name'=> 'update_services']);
        Permission::create(['name'=> 'delete_articles']);
        Permission::create(['name'=> 'make_comment']);
        Permission::create(['name'=> 'make_report']);
        Permission::create(['name'=> 'restric_user']);
        Permission::create(['name'=> 'manage_categories']);
        Permission::create(['name'=> 'assign_admin_role']);
        Permission::create(['name'=> 'read_reports']);
    }
}
