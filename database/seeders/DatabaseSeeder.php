<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    public function run() {
        // Barangs
        $barangs = [
            ['BRG001','Kabel LAN'],['BRG002','Switch Hub'],['BRG003','Router'],
            ['BRG004','UPS'],['BRG005','Monitor'],['BRG006','Mouse'],
            ['BRG007','Keyboard'],['BRG008','Flashdisk'],['BRG009','HDD Eksternal'],['BRG010','Webcam'],
            ['BRG011','Speaker'],['BRG012','Headset'],['BRG013','Printer'],
            ['BRG014','Scanner'],['BRG015','Projector']
        ];
        foreach($barangs as $b) {
            DB::table('barangs')->insert(['kode_barang'=>$b[0],'nama_barang'=>$b[1]]);
        }
        // Barang Masuk
        for($i=1;$i<=10;$i++){
            DB::table('barang_masuks')->insert([
                'no_barang_masuk'=>"BM00{$i}",
                'kode_barang'=>"BRG00{$i}",
                'quantity'=>rand(5,50),
                'origin'=>['Jakarta','Bandung','Surabaya'][array_rand([0,1,2])],
                'tanggal_masuk'=>now()->subDays(rand(1,10))->toDateString()
            ]);
        }
        // Barang Keluar
        for($i=1;$i<=5;$i++){
            DB::table('barang_keluars')->insert([
                'no_barang_keluar'=>"BK00{$i}",
                'kode_barang'=>"BRG00{$i}",
                'quantity'=>rand(1,20),
                'destination'=>['Semarang','Bali','Medan'][array_rand([0,1,2])],
                'tanggal_keluar'=>now()->toDateString()
            ]);
        }
    }
}