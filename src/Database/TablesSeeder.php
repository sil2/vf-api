<?php

namespace Sil2\VfApi\Database;

use Carbon\Carbon;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Sil2\VfApi\Models\Widget;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Widget::truncate();

        foreach (range(1, 100) as $index) {
            $patient = Widget::create([
                'name'        => $faker->text(20),
                'description' => $faker->text(100)
            ]);
        }
    }
}
