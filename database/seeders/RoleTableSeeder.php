<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        $roles = [
            [
                'section_id'                =>  1,
                'title'                     =>  'Dashboard',
                'route'                     =>  'admin.dashboard.index',
                'params'                    =>  '',
                'icon'                      =>  'icon-home',
                'image'                     =>  '',
                'icon_type'                 =>  'line-icons',
                'allowed_permissions'       =>  'access',
                'sequence'                  =>  1,
                'is_display'                =>  'y',
                'is_active'                 =>  'y',
                'created_at'                => \Carbon\Carbon::now(),
                'updated_at'                => \Carbon\Carbon::now(),
            ],
            [
                'section_id'                =>  2,
                'title'                     =>  'Category',
                'route'                     =>  'admin.category.index',
                'params'                    =>  '',
                'icon'                      =>  'icon-users',
                'image'                     =>  '',
                'icon_type'                 =>  'line-icons',
                'allowed_permissions'       =>  'access,add,edit,delete',
                'sequence'                  =>  1,
                'is_display'                =>  'y',
                'is_active'                 =>  'y',
                'created_at'                => \Carbon\Carbon::now(),
                'updated_at'                => \Carbon\Carbon::now(),
            ],
            [
                'section_id'                =>  3,
                'title'                     =>  'News',
                'route'                     =>  'admin.news.index',
                'params'                    =>  '',
                'icon'                      =>  'fas fa-book',
                'image'                     =>  '',
                'icon_type'                 =>  'font-awesome',
                'allowed_permissions'       =>  'access,add,edit,delete',
                'sequence'                  =>  1,
                'is_display'                =>  'y',
                'is_active'                 =>  'y',
                'created_at'                => \Carbon\Carbon::now(),
                'updated_at'                => \Carbon\Carbon::now(),
            ],


            [
                'section_id'                =>  4,
                'title'                     =>  'CMS Pages',
                'route'                     =>  'admin.pages.index',
                'params'                    =>  '',
                'icon'                      =>  'fas fa-book',
                'image'                     =>  '',
                'icon_type'                 =>  'font-awesome',
                'allowed_permissions'       =>  'access,edit',
                'sequence'                  =>  1,
                'is_display'                =>  'y',
                'is_active'                 =>  'y',
                'created_at'                => \Carbon\Carbon::now(),
                'updated_at'                => \Carbon\Carbon::now(),
            ],
            [
                'section_id'                => 5,
                'title'                     => 'Site Configuration',
                'route'                     => 'admin.settings.index',
                'params'                    => '',
                'icon'                      =>  'icon-settings',
                'image'                     => '',
                'icon_type'                 =>  'font-awesome',
                'sequence'                  => 1,
                'is_display'                =>  'y',
                'is_active'                 =>  'y',
                'allowed_permissions'       => 'access',
                'created_at'                => \Carbon\Carbon::now(),
                'updated_at'                => \Carbon\Carbon::now(),
            ],

        ];
        Role::insert($roles);
        //updated permissions of admin for new added section and role
        if (!empty(getPermissions('admin'))) {
            DB::table('admins')->where(['id' => 1])->update(['permissions' => serialize(getPermissions('admin'))]);
        }
    }
}
