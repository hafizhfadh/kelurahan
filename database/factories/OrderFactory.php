<?php

use App\Models\Service;
use App\Libraries\Hafizh;
use Faker\Generator as Faker;

$factory->define(App\Models\PickupOrder::class, function (Faker $faker) {
  $rand = rand(1,count(Service::all(['service_name'])));
  $service = Service::find($rand)->get();
  $service_method = ["0" => "File Ambil Di Kelurahan", "1" => "File Di Antar Ke Tujuan"];
  $rand_key = array_rand($service_method);

  $opt = Hafizh::getEnumValues('pickup_orders','status');
  $rand_opt = array_rand($opt);
    return [
        'name' => $faker->name,
        'user_id' => rand(1,2),
        'address' => $faker->address,
        'phone_number' => $faker->PhoneNumber,
        'phone_number_now' => $faker->PhoneNumber,
        'service_name' => $service[0]->service_name,
        'action_method' => $service_method[$rand_key],
        'status' => $opt[$rand_opt],
    ];
});
