<?php

use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\table_buku::insert([
            [
                'judul'  => 'Surti Berjalam',
                'penerbit' => 'CV Media Karya',
                'pengarang' => 'Tejo',
                'foto' => '-',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'  => 'Tejo Makan',
                'penerbit' => 'CV Suka',
                'pengarang' => 'Surti',
                'foto' => '-',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'  => 'Mahmud minum',
                'penerbit' => 'CV Karya Jelek',
                'pengarang' => 'Ainun',
                'foto' => '-',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
