<?php

namespace Database\Seeders;

use App\Models\alamat;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Jalan Pahlawan', 'Bangsalsari', 'Bangsalsari', 'Krajan'],
            ['Jalan Pemuda', 'Kaliwates', 'Kaliwates', 'Sidorejo'],
            ['Jalan Raya', 'Jelbuk', 'Jelbuk', 'Mojo'],
            ['Jalan Merdeka', 'Sumberjambe', 'Sumberjambe', 'Sidomulyo'],
            ['Jalan Kartini', 'Patrang', 'Patrang', 'Pohkemuning'],
            ['Jalan Mangga', 'Bangsalsari', 'Badean', 'Dusun Mangga'],
            ['Jalan Anggrek', 'Jelbuk', 'Sukojember', 'Dusun Anggrek'],
            ['Jalan Mawar', 'Ambulu', 'Sumberejo', 'Dusun Mawar'],
            ['Jalan Melati', 'Sukowono', 'Sukorejo', 'Dusun Melati'],
            ['Jalan Kamboja', 'Puger', 'Puger Kulon', 'Dusun Kamboja'],
            ['Jalan Dahlia', 'Jenggawah', 'Sruni', 'Dusun Dahlia'],
            ['Jalan Sakura', 'Ajung', 'Mangaran', 'Dusun Sakura'],
        ];

        foreach ($data as $row) {
            // Ambil data dari inputan
            $jalan = $row[0];
            $kecamatan = $row[1];
            $desa = $row[2];
            $dusun = $row[3];

            // Cari wilayah berdasarkan kecamatan dan desa
            $wilayah = Wilayah::whereHas('kecamatan', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            })->whereHas('desa', function ($query) use ($desa) {
                $query->where('desa', $desa);
            })->first();

            // Jika wilayah tidak ditemukan, lewati entri ini
            if (!$wilayah) {
                continue;
            }

            // Buat entri alamat
            alamat::create([
                'jalan' => $jalan,
                'id_wilayah' => $wilayah->id,
                'dusun' => $dusun,
            ]);
        }
    }
}
