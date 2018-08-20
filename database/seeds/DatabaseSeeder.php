<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([

            [
                'name' => 'Luis Claudio',
                'date_of_birth' => '1990-01-09',
                'document_path' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'email' => 'luisclaudiomjr@gmail.com',
                'password' => bcrypt('123123'),
                'active' => false,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
        DB::table('coins')->insert([

                [
                    'name' => 'BTC',
                    'abbrev' => 'BTC',
                    'fixed_value' => 6500,
                    'image' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                    'wallet_address' => '123',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'BCH',
                    'abbrev' => 'BCH',
                    'fixed_value' => 550,
                    'image' => 'https://totalcrypto.io/wp-content/uploads/2018/06/bitcoin-cash-bch-logo-250x250.png',
                    'wallet_address' => '234',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LTC',
                    'abbrev' => 'LTC',
                    'fixed_value' => 60,
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/LTC-400.png/220px-LTC-400.png',
                    'wallet_address' => '345',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'DASH',
                    'abbrev' => 'DASH',
                    'fixed_value' => 150,
                    'image' => 'https://briandcolwell.com/wp-content/uploads/2017/06/qiIMHZr.png',
                    'wallet_address' => '456',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'XRP',
                    'abbrev' => 'XRP',
                    'fixed_value' => 0.34,
                    'image' => 'https://eventcal.io/wp-content/uploads/2018/02/8101e36e-bfce-48a9-a7a6-368b6e9452dd.png',
                    'wallet_address' => '567',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'ETH',
                    'abbrev' => 'ETH',
                    'fixed_value' => 300,
                    'image' => 'https://s2.coinmarketcap.com/static/img/coins/200x200/1027.png',
                    'wallet_address' => '678',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
                

        ]);
    }
}
