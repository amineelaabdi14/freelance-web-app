<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=> 'visitor']);
        Role::create(['name'=> 'seller']);
        Role::create(['name'=> 'admin']);
            
        Role::findByName('visitor')->givePermissionTo([
            'read_services',
            'make_comment',
            'make_report',
        ]);
        Role::findByName('seller')->givePermissionTo([
            'read_services',
            'make_comment',
            'delete_articles',
            'update_services',
            'make_report',
        ]);
        Role::findByName('admin')->givePermissionTo([
            'read_services',
            'update_services',
            'delete_articles',
            'make_comment',
            'make_report',
            'assign_admin_role',
            'restric_user',
            'manage_categories',
            'read_reports',
        ]);
    }
}
