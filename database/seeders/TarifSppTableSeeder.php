<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifspp = [
            [
                'bulan' => 'Januari 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Februari 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Maret 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'April 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Mei 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Juni 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Juli 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Agustus 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'September 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Oktober 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'November 2023',
                'nominal' => '300000'
            ],
            [
                'bulan' => 'Desember 2023',
                'nominal' => '300000'
            ]
        ];
        DB::table('tarif_spp')->insert($tarifspp);
    }
}
