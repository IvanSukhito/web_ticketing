<?php

namespace Database\Seeders;

use App\Models\Acara;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void
    {
        // if categories is empty,run category seeder first

        //FAKER INSTANCE
        $faker = Factory::create();

        //Create event based on event count
        for ($i = 0; $i < $eventCount; $i++) {
            //create event
            $Acara = Acara::create([
                'name' => $faker->sentence(2),
                'slug' => $faker->unique()->slug(2),
                'description' => $faker->paragraph,
                'namaPelaksana' => $faker->sentence(2),
                'lokasi' => $faker->address,
                'waktu' => $faker->dateTimeBetween('+1 month', '+6 month'),
                'jenis_acara' => $faker->sentence(3),
            ]);

            //BUAT TIKET TERGANTUNG TIKET COUNT
            for ($j = 0; $j < $ticketCount; $j++) {
                $Acara->tickets()->create([
                    'name' => $faker->sentence(3),
                    'harga' => $faker->numberBetween(100, 1000),
                    'kuantitas' => $faker->numberBetween(10, 10),
                    'max_buy' => $faker->numberBetween(1, 10),
                ]);
            }
        }
    }
}
