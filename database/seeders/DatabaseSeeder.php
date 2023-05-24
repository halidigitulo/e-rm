<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@rme.com',
            'password' => Hash::make('password'),
        ]);

        $data_kies = [
            [
                'keterangan' => 'kondisi pasien, diagnosis, rencana terapi'
            ],
            [
                'keterangan' => 'kondisi pasien tidak stabil'
            ],
            [
                'keterangan' => 'persetujuan menjadi pasien umum'
            ],
            [
                'keterangan' => 'persetujuan pemberian obat injeksi'
            ]
        ];
        DB::table('kies')->insert($data_kies);

        $data_m_kep = [
            ['keterangan' => 'Ketidakefektifan bersihan jalan nafas'],
            ['keterangan' => 'Ketidakefektifan pola nafas'],
            ['keterangan' => 'Ketidakefektifan perfusi jaringan perifer'],
            ['keterangan' => 'Ketidakefektifan perfusi jaringan jantung'],
            ['keterangan' => 'Ketidakefektifan perfusi jaringan ginjal'],
            ['keterangan' => 'Ketidakefektifan perfusi jaringan otak'],
            ['keterangan' => 'Penurunan curah jantung'],
            ['keterangan' => 'Kekurangan volume cairan'],
            ['keterangan' => 'Kelebihan volume cairan'],
            ['keterangan' => 'Gangguan pengaturan suhu tubuh'],
            ['keterangan' => 'Gangguan rasa nyaman nyeri'],
            ['keterangan' => 'Gangguan pemenuhan nutrisi'],
            ['keterangan' => 'Kerusakan integritas kulit'],
            ['keterangan' => 'Gangguan eliminasi urine'],
            ['keterangan' => 'Hambatan mobilitas fisik'],
            ['keterangan' => 'Gangguan kecemasan'],
            ['keterangan' => 'Risiko aspirasi'],
            ['keterangan' => 'Risiko infeksi'],
            ['keterangan' => 'Risiko dehidrasi'],
        ];
        DB::table('m_keperawatans')->insert($data_m_kep);
        
        $data_r_kep =[
            ['keterangan' => 'Buka jalan nafas, gunakan teknik head tilt chin lift atau jaw thrust bila perlu'],
            ['keterangan' => 'Posisikan pasien untuk memastikan ventilasi'],
            ['keterangan' => 'Lakukan suction'],
            ['keterangan' => 'Berikan O2'],
            ['keterangan' => 'Pasang mayo'],
            ['keterangan' => 'Lakukan fisioterapi dada'],
            ['keterangan' => 'Berikan bronchodilator'],
            ['keterangan' => 'Auskultasi nafas'],
            ['keterangan' => 'Monitor respirasi dan O2'],
            ['keterangan' => 'Monitor TD, suhu, nadi dan RR'],
            ['keterangan' => 'Monitor suhu, warna dan kelembapan warna kulit'],
            ['keterangan' => 'Monitor status kardiovaskuler pasien (EKG)'],
            ['keterangan' => 'Monitor tingkat kesadaran pasien'],
            ['keterangan' => 'Monitor tanda-tanda infeksi'],
            ['keterangan' => 'Monitor kualitas dari nadi'],
            ['keterangan' => 'Monitor sianosis perifer'],
            ['keterangan' => 'Monitor suhu minmal setiap 2 jam'],
            ['keterangan' => 'Monitor lokasi, karakteristik, durasi, frekuensi, kualitas dan faktor presifitasi nyeri'],
            ['keterangan' => 'Kompres pasien pada lipatan paha dan axilia'],
            ['keterangan' => 'Selimuti pasien'],
            ['keterangan' => 'Ajarkan teknik distraksi dan relaksasi'],
            ['keterangan' => 'Jelaskan semua prosedur'],
            ['keterangan' => 'Ciptakan hubungan saling percaya'],
            ['keterangan' => 'Pasang pengaman immobilisasi dengan spalk'],
            ['keterangan' => 'Kolaborasi dalam intubasi, ventilatorlabel'],
            ['keterangan' => 'Kolaborasi dalam pemasangan kateter, NGT, kumbah lambung'],
            ['keterangan' => 'Kolaborasi dalam pemberian antipiretik, analgetik, antimetetic, antibiotic'],
            ['keterangan' => 'Kolaborasi dalam pemberian cairan IV'],
        ];
        DB::table('r_keperawatans')->insert($data_r_kep);

        $data_t_kep =[
            ['keterangan' => 'Buka jalan nafas, gunakan teknik head tilt chin lift atau jaw thrust bila perlu'],
            ['keterangan' => 'Posisikan pasien untuk memastikan ventilasi'],
            ['keterangan' => 'Lakukan suction'],
            ['keterangan' => 'Berikan O2'],
            ['keterangan' => 'Pasang mayo'],
            ['keterangan' => 'Lakukan fisioterapi dada'],
            ['keterangan' => 'Berikan bronchodilator'],
            ['keterangan' => 'Auskultasi nafas'],
            ['keterangan' => 'Monitor respirasi dan O2'],
            ['keterangan' => 'Monitor TD, suhu, nadi dan RR'],
            ['keterangan' => 'Monitor suhu, warna dan kelembapan warna kulit'],
            ['keterangan' => 'Monitor status kardiovaskuler pasien (EKG)'],
            ['keterangan' => 'Monitor tingkat kesadaran pasien'],
            ['keterangan' => 'Monitor tanda-tanda infeksi'],
            ['keterangan' => 'Monitor kualitas dari nadi'],
            ['keterangan' => 'Monitor sianosis perifer'],
            ['keterangan' => 'Monitor suhu minmal setiap 2 jam'],
            ['keterangan' => 'Monitor lokasi, karakteristik, durasi, frekuensi, kualitas dan faktor presifitasi nyeri'],
            ['keterangan' => 'Kompres pasien pada lipatan paha dan axilia'],
            ['keterangan' => 'Selimuti pasien'],
            ['keterangan' => 'Ajarkan teknik distraksi dan relaksasi'],
            ['keterangan' => 'Jelaskan semua prosedur'],
            ['keterangan' => 'Ciptakan hubungan saling percaya'],
            ['keterangan' => 'Pasang pengaman immobilisasi dengan spalk'],
            ['keterangan' => 'Kolaborasi dalam intubasi, ventilatorlabel'],
            ['keterangan' => 'Kolaborasi dalam pemasangan kateter, NGT, kumbah lambung'],
            ['keterangan' => 'Kolaborasi dalam pemberian antipiretik, analgetik, antimetetic, antibiotic'],
            ['keterangan' => 'Kolaborasi dalam pemberian cairan IV'],
        ];
        DB::table('t_keperawatans')->insert($data_t_kep);

    }
}
