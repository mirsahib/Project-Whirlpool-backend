<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tenant::class, 10)->create()->each(function ($tenant) {
            // Seed the relation with one address
            $mother = factory(App\MotherMeter::class)->make();
            $sub_meter = factory(App\SubMeter::class)->make();
            $tenant->mother_meter()->save($mother);
            $mother->sub_meters()->save($sub_meter);
        });
    }
}
