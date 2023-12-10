<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('guestbook')->insert([
        //     'nama' => 'Hagi',
        //     'alamat' => 'Cimahi',
        //     'email' => 'hagisunandar@gmail.com',
        //     'nomor_wa' => '0888',
        // ]);

        \App\Models\Guestbook::factory(43)->create();

    }
}
