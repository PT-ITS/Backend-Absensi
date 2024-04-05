<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CEO
        User::create([
            'name' => 'Achmad Munsharif',
            'email' => 'achmadmunsharif@ptits.com',
            'alamat_pegawai' => 'Sumenep',
            'tanggal_lahir' => '1995-01-01',
            'tanggal_bergabung' => '2024-03-04',
            'jabatan' => 'CEO',
            'level' => '1',
            'password' => Hash::make('12345'),
        ]);

        // Pegawai
        User::create([
            'name' => 'Bagus Untoro',
            'email' => 'bagusuntoro@ptits.com',
            'alamat_pegawai' => 'Sumenep',
            'tanggal_lahir' => '2002-08-06',
            'tanggal_bergabung' => '2024-03-04',
            'jabatan' => 'Backend Developer',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Rafli Januar Rizki',
            'email' => 'raflijanuar@ptits.com',
            'alamat_pegawai' => 'Sumenep',
            'tanggal_lahir' => '2001-01-31',
            'tanggal_bergabung' => '2024-03-04',
            'jabatan' => 'Backend Developer',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Jazaul Ihsan Al',
            'email' => 'jhezyalihsan@ptits.com',
            'alamat_pegawai' => 'Sumenep',
            'tanggal_lahir' => '1999-12-23',
            'tanggal_bergabung' => '2024-03-04',
            'jabatan' => 'Frontend Developer',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'M. Farhan Alif Zamorano',
            'email' => 'farhanzamorano@ptits.com',
            'alamat_pegawai' => 'Sumenep',
            'tanggal_lahir' => '1999-12-23',
            'tanggal_bergabung' => '2024-03-04',
            'jabatan' => 'Frontend Developer',
            'password' => Hash::make('12345'),
        ]);

    }
}
