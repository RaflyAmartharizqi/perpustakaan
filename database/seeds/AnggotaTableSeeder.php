<?php

use Illuminate\Database\Seeder;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\table_anggota::insert([
            [
                'nama_anggota'  => 'sukri',
                'alamat' => 'Sawojejer',
                'telp' => '081827267',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_anggota'  => 'Hery',
                'alamat' => 'Kedungkandang',
                'telp' => '082882828',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_anggota'  => 'Mila',
                'alamat' => 'Nongkojajar',
                'telp' => '0818272725',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
