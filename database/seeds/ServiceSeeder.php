<?php

use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for ($i=0; $i < 20; $i++) {
        $service = Service::create([
          'service_name' => $faker->name,
          'detail' => $faker->realText,
          'required_file' => "ktp, kk, surat rt, surat rw",
        ]);
      }
    }
}
