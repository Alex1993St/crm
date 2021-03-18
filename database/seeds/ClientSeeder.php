<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Company;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=ClientSeeder
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10000; $i++) {
            $client = Client::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => mt_rand(1000000000, 9999999999),
            ]);
           $random = mt_rand(1, 5);

           $companies = Company::get()->random($random);

           $client->company()->attach($companies->pluck('id'));
        }
    }
}
