<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Faker Factory
use Faker\Factory as Faker;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('trans_surat_masuk')->insert([
                // 'pegawai_nama' => $faker->name,
                // 'pegawai_jabatan' => $faker->jobTitle,
                // 'pegawai_umur' => $faker->numberBetween(25, 40),
                // 'pegawai_alamat' => $faker->address,
                'asal_surat_masuk' => $faker->company,
                'pejabat_pengirim_surat' => $faker->name,
                'kepada' => $faker->name,

                'nomor_surat' => 'W' . $faker->numberBetween(1, 90) . '-U' . $faker->numberBetween(1, 10) . '/OT.2/' . $faker->numberBetween(1, 12) . '/2020',
                'nomor_agenda' => $faker->numberBetween(1, 10) . '/OT.2/' . $faker->numberBetween(1, 12) . '/2020',

                // 'perihal' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'perihal' => $faker->sentence($nbWords = 6, $variableNbWords = true),

                // 'tanggal_surat' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_surat' => $faker->unique()->dateTimeBetween('-7 months', 'now')->format('Y-m-d'),
                'tenggat_waktu_tindak_lanjut' => $faker->unique()->dateTimeBetween('-7 months', 'now')->format('Y-m-d'),
                'tanggal_agenda' => $faker->unique()->dateTimeBetween('-7 months', 'now')->format('Y-m-d'),

                'mulai_pukul' => $faker->time($format = 'H:i:s', $max = 'now'),
                'selesai_pukul' => $faker->time($format = 'H:i:s', $max = 'now'),

                'email_pengirim' => $faker->unique()->safeEmail,
                'alamat_pengirim' => $faker->address,

                'id_sifat_penyelesaian_surat' => $faker->numberBetween(1, 3),
                'id_sifat_keamanan_surat' => $faker->numberBetween(1, 3),
                'id_asal_ekspedisi_surat_masuk' => $faker->numberBetween(1, 3),
                'id_jenis_surat_masuk' => $faker->numberBetween(1, 7)
            ]);
        }

        // for ($i = 0; $i < 100; $i++) {
        //     $jk = $faker->randomElement(['pria', 'wanita']);
        //     if ($jk == "pria") {
        //         $gender = "male";
        //     } else {
        //         $gender = "female";
        //     }
        //     $data = [
        //         'nama' => $faker->name($gender),
        //         'jenis_kelamin' => $jk,
        //         'no_telp' => $faker->phoneNumber,
        //         'tanggal_lahir' => $faker->date('Y-m-d', 'now'),
        //         'alamat' => $faker->address,
        //         'email' => $faker->email,
        //         'created_at' => Time::now()
        //     ];
        //     $this->db->table('pegawai')->insert($data);
        // }
    }
}
