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
        DB::table('positions')->insert([
            'name' => 'Administration',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('positions')->insert([
            'name' => 'Member',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => "admin@gmail.com",
            'phone' => "0346027346",
            'position_id' => 1,
            'password' => Hash::make('admin1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Customer',
            'email' => "customer@gmail.com",
            'phone' => "0346027222",
            'position_id' => 2,
            'password' => Hash::make('admin1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Chưa xác nhận',
            'slug' => 'chua-xac-nhan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Đã xác nhận',
            'slug' => 'da-xac-nhan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Đang vận chuyển',
            'slug' => 'da-van-chuyen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Thành công',
            'slug' => 'thanh-cong',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Hủy hàng',
            'slug' => 'huy-hang',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('payment_status')->insert([
            'name' => 'Đã thanh toán',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('payment_status')->insert([
            'name' => 'Chưa thanh toán',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
