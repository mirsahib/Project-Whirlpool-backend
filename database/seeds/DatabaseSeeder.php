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
        factory(App\House::class, 10)->create()->each(function ($house) {
            // Seed the relation with one address
            $tenant = factory(App\Tenant::class)->make();
            $mother = factory(App\MotherMeter::class)->make();
            $sub_meter = factory(App\SubMeter::class)->make();
            $house->tenant()->save($tenant);
            $house->motherMeter()->save($mother);
            $mother->sub_meters()->save($sub_meter);
        });
    }
}
