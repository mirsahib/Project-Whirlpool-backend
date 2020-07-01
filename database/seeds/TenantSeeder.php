<?php

use Illuminate\Database\Seeder;
use App\Tenant;
use App\MotherMeter;
use App\SubMeter;

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

            $mother_meter = factory(MotherMeter::class)->make();
            $tenant->mother_meter()->save($mother_meter);
            $sub_meter = factory(SubMeter::class)->make();
            $mother_meter->sub_meters()->saveMany($mother_meter);
        });
    }
}
