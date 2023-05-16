<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'id_setting' => '1',
            'no_akun' => 'KA1',
            'nama_transaksi' => 'Retur',
        ]);
        $setting = Setting::create([
            'id_setting' => '2',
            'no_akun' => 'KA2',
            'nama_transaksi' => 'Pembelian',
        ]);
        $setting = Setting::create([
            'id_setting' => '3',
            'no_akun' => 'KA3',
            'nama_transaksi' => 'Kas',
        ]);
    }
}
