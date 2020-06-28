<?php

use Illuminate\Database\Seeder;
use App\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Tenant::class, 20)->create()->each(function($tenant){
            $tenant->save();
        });
    }
}
