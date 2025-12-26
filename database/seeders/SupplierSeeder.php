<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            ['PT. Sumber Jaya Abadi', 'Budi Santoso'],
            ['CV. Maju Bersama', 'Andi Wijaya'],
            ['PT. Sentosa Makmur', 'Rina Lestari'],
            ['CV. Cahaya Mandiri', 'Dewi Anggraini'],
            ['PT. Global Tekstil', 'Hendra Saputra'],
            ['PT. Prima Logistik', 'Agus Pratama'],
            ['CV. Karya Utama', 'Siti Nurhaliza'],
            ['PT. Mitra Sejahtera', 'Fajar Nugroho'],
            ['PT. Nusantara Jaya', 'Doni Firmansyah'],
            ['CV. Anugerah Abadi', 'Rizky Ramadhan'],
            ['PT. Indo Makmur', 'Wahyu Setiawan'],
            ['CV. Berkah Usaha', 'Nur Aisyah'],
            ['PT. Cahaya Nusantara', 'Arief Kurniawan'],
            ['PT. Sinar Abadi', 'Dian Prasetyo'],
            ['CV. Mandiri Sentosa', 'Putri Amelia'],
            ['PT. Bintang Timur', 'Yoga Pramudya'],
            ['CV. Mitra Jaya', 'Lukman Hakim'],
            ['PT. Lestari Abadi', 'Indah Permata'],
            ['PT. Sukses Bersama', 'Reza Maulana'],
            ['CV. Tunas Harapan', 'Nabila Zahra'],
            ['PT. Mega Perkasa', 'Bayu Aji'],
            ['CV. Cipta Solusi', 'Rafi Akbar'],
            ['PT. Artha Sejahtera', 'Mega Wulandari'],
            ['PT. Jaya Sentosa', 'Ilham Fauzi'],
            ['CV. Kencana Abadi', 'Ayu Puspita'],
        ];

        foreach ($suppliers as $index => [$company, $name]) {
            Supplier::create([
                'name'         => $name,
                'company'      => $company,
                'tax_id'       => rand(10, 99) . '.' . rand(100, 999) . '.' . rand(100, 999) . '.' . rand(1, 9),
                'email'        => Str::slug($company, '') . ($index + 1) . '@supplier.id',
                'phone'        => '08' . rand(111111111, 999999999),
                'address'      => 'Jl. Raya Industri No. ' . rand(1, 200),
                'city'         => collect(['Jakarta', 'Bandung', 'Surabaya', 'Semarang', 'Solo'])->random(),
                'region'       => collect(['DKI Jakarta', 'Jawa Barat', 'Jawa Timur', 'Jawa Tengah'])->random(),
                'country'      => 'ID',
                'postal_code'  => rand(10000, 99999),
            ]);
        }
    }
}
