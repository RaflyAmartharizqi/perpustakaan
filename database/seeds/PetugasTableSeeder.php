<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\table_petugas::insert([
            [
                'nama_petugas'  => 'Surti',
                'alamat' => 'Malang',
                'telp' => '08999999',
                'username' => 'surti',
                'password' => '12345',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'  => 'Tejo',
                'alamat' => 'Surabaya',
                'telp' => '081234999',
                'username' => 'tejo',
                'password' => '54321',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'  => 'Mahmud',
                'alamat' => 'Sidoarjo',
                'telp' => '08133452637',
                'username' => 'mahmud',
                'password' => '00000',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
