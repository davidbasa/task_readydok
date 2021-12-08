<?php

namespace Database\Seeders;

use App\Models\Klinik;
use Illuminate\Database\Seeder;

class KlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klinik::factory()->times(10)->create();
    }
}
