<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pengalamans;
use Faker\Factory as Faker;
class PengalamansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $faker = Faker::create();
 
         for($i = 1; $i <= 50; $i++){
        DB::table('pengalamans')->insert([
            'id_profilalumni' => $faker->name,
            'judul' => $faker->name,
            'nama' => $faker->name,
            'programstudi' => $faker->name,
            'angkatan' => $faker->name,
            'jabatan' => $faker->name,
            'pekerjaan' => $faker->name,
            'detail' => $faker->name,
            'foto' => $faker->name
        ]);
    }
    }
}
