<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 50)->create()->each(function ($u) {
            $u->buyin()->save(factory(App\Buyin::class)->make());
            $u->buyback()->save(factory(App\Buyback::class)->make());
        });
    }
}
