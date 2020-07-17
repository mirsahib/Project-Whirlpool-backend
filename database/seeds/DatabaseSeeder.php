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
            $tenants = factory(App\Tenant::class,5)->make();
            $mother = factory(App\MotherMeter::class)->make();
            $sub_meter = factory(App\SubMeter::class,5)->make();
            
            $house->tenants()->saveMany($tenants);
            $house->motherMeter()->save($mother);

            //$tenant->payments()->saveMany($payment);
            $tenants->each(function($tenant){
                $payment = factory(App\Payment::class,5)->make();
                $tenant->payments()->saveMany($payment);
            });

            $mother->sub_meters()->saveMany($sub_meter);
        });
    }
}
