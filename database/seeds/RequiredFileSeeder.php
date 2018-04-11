<?php

use App\Models\RequiredFile;
use Illuminate\Database\Seeder;

class RequiredFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for ($i=0; $i < 100; $i++) {
        $service = RequiredFile::create([
          'name' => $faker->name,
        ]);
      }
    }
}
