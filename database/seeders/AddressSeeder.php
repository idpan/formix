<?php
// database/seeders/AddressSeeder.php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::insert(

            [
                'name' => 'Office & Workshop 1',
                'address' => 'Ruko Golden Madrid Blok D Nomor 26 Room
            1537, Jl. Letnan Sutopo Bsd City, Desa/Kelurahan Rawa Mekarjaya,
            Kec. Serpong, Kota Tangerang Selatan, Provinsi Banten 15310',
            ]

        );
        Address::insert(
            [
                'name' => 'Office & Workshop 2',
                'address' => 'Jl. Raya Tanjung KM.08, Wadon, Kekait,
        Gunungsari, Kab. Lombok Barat, NTB 83351',
            ]
        );
    }
}
