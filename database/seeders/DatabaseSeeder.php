<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed some tours
        $tours = [
            [
                'tourID' => 1,
                'title' => 'Tour Du Lịch Miền Bắc: Hà Nội - Hạ Long - Sa Pa',
                'diemden' => 'Hà Nội, Quảng Ninh, Lào Cai',
                'mien' => 'Bac',
                'thoigian' => '4 ngày 3 đêm',
                'gia_nguoiLon' => 4500000,
                'socho' => 20,
                'tinhkhadung' => 1,
            ],
            [
                'tourID' => 3,
                'title' => 'Tour Du Lịch Miền Trung: Đà Nẵng - Hội An - Huế',
                'diemden' => 'Đà Nẵng, Quảng Nam, Thừa Thiên Huế',
                'mien' => 'Trung',
                'thoigian' => '3 ngày 2 đêm',
                'gia_nguoiLon' => 3200000,
                'socho' => 15,
                'tinhkhadung' => 1,
            ],
            [
                'tourID' => 4,
                'title' => 'Tour Du Lịch Miền Nam: TP.HCM - Cần Thơ - Phú Quốc',
                'diemden' => 'TP.HCM, Cần Thơ, Kiên Giang',
                'mien' => 'Nam',
                'thoigian' => '5 ngày 4 đêm',
                'gia_nguoiLon' => 5800000,
                'socho' => 25,
                'tinhkhadung' => 1,
            ],
            [
                'tourID' => 7,
                'title' => 'Tour Khám Phá Tây Nguyên: Đà Lạt - Buôn Ma Thuột',
                'diemden' => 'Lâm Đồng, Đắk Lắk',
                'mien' => 'Nam',
                'thoigian' => '3 ngày 3 đêm',
                'gia_nguoiLon' => 2900000,
                'socho' => 10,
                'tinhkhadung' => 1,
            ],
        ];

        foreach ($tours as $tour) {
            DB::table('tours')->insert($tour);
        }

        // Seed an admin
        DB::table('admin')->insert([
            'username' => 'admin',
            'password' => 'admin123',
            'fullname' => 'System Administrator',
        ]);
    }
}
