<?php

namespace Database\Seeders;

use App\Models\Relasi;
use Illuminate\Database\Seeder;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relasi::factory()->times(11)->create();
    }
}
