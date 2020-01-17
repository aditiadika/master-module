<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MasterPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['guard_name' => 'web', 'name' => 'add master', 'created_at' => now()],
            ['guard_name' => 'web', 'name' => 'edit master', 'created_at' => now()],
            ['guard_name' => 'web', 'name' => 'delete master', 'created_at' => now()],
            ['guard_name' => 'web', 'name' => 'view master', 'created_at' => now()],
        ]);
    }
}
