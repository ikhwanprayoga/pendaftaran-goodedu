<?php

use App\KategoriInstitusi;
use App\KategoriPendaftar;
use App\MasterInstitusi;
use Illuminate\Database\Seeder;

class DataMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriInstitusis = [
            ['nama' => 'SEKOLAH'],
            ['nama' => 'UNIVERSITAS'],
        ];

        $kategoriPendaftars = [
            ['nama' => 'SISWA', 'kategori_institusi_id' => 1],
            ['nama' => 'MAHASISWA', 'kategori_institusi_id' => 2],
        ];

        $masterInstitusis = [
            ['kategori_institusi_id' => 1, 'nama' => 'SMAN 1 PONTINAK'],
            ['kategori_institusi_id' => 1, 'nama' => 'SMAN 2 PONTINAK'],
            ['kategori_institusi_id' => 1, 'nama' => 'SMAN 3 PONTINAK'],
            ['kategori_institusi_id' => 1, 'nama' => 'SMAN 4 PONTINAK'],
            ['kategori_institusi_id' => 2, 'nama' => 'UNIVERSITAS TANJUNGPURA'],
            ['kategori_institusi_id' => 2, 'nama' => 'UNIVERSITAS MUHAMMADIYAH PONTIANAK'],
            ['kategori_institusi_id' => 2, 'nama' => 'UNIVERSITAS PANCA BHAKTI PONTIANAK'],
        ];

        foreach ($kategoriInstitusis as $key => $kategoriInstitusi) {
            KategoriInstitusi::create($kategoriInstitusi);
        }

        foreach ($kategoriPendaftars as $key => $kategoriPendaftar) {
            KategoriPendaftar::create($kategoriPendaftar);
        }

        foreach ($masterInstitusis as $key => $masterInstitusi) {
            MasterInstitusi::create($masterInstitusi);
        }
    }
}
