<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=CompanySeeder
     *
     * @return void
     */
    public function run()
    {
        $companies = [];
        $faker = Faker::create();
        for ($i=0; $i < 10000; $i++) {
            $companies[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => mt_rand(1000000000, 9999999999),
            ];
        }

        $chunks = array_chunk($companies, 5000);

        foreach ($chunks as $chunk) {
            Company::insert($chunk);
        }
    }
}
