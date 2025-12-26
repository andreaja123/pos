<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada setidaknya satu warehouse untuk relasi stok
        $warehouseId = DB::table('warehouses')->first()?->id ?? DB::table('warehouses')->insertGetId([
            'name' => 'Gudang Utama',
            'location' => 'Cilacap',
            'type' => 'Pusat Penjualan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $products = [
            [
                'name' => 'Kemeja Flanel Premium',
                'sell_price' => 150000,
                'cost_price' => 100000,
                'tax_rate' => 11,
                'variants' => [
                    ['brand' => 'Hanania', 'color' => 'Merah', 'size' => 'L'],
                    ['brand' => 'Hanania', 'color' => 'Biru', 'size' => 'M'],
                ],
                'image' => 'https://images.unsplash.com/photo-1589310243389-96a5483213a8?q=80&w=500'
            ],
            [
                'name' => 'Smartphone Pro Max 15',
                'sell_price' => 15000000,
                'cost_price' => 12000000,
                'tax_rate' => 11,
                'is_serial' => true, // Flag buatan untuk logika seeder
                'variants' => [
                    ['brand' => 'TechBrand', 'color' => 'Titanium', 'size' => '256GB'],
                ],
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=500'
            ],
            // ... tambahkan produk lainnya jika perlu
        ];

        foreach ($products as $item) {
            // 1. Insert ke tabel products
            $productId = DB::table('products')->insertGetId([
                'name' => $item['name'],
                'code' => 'PRD-' . strtoupper(Str::random(6)),
                'barcode' => '899' . rand(100000000, 999999999),
                'cost_price' => $item['cost_price'],
                'sell_price' => $item['sell_price'],
                'tax_rate' => $item['tax_rate'],
                'discount_rate' => $item['discount_rate'] ?? 0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Insert ke tabel product_images
            DB::table('product_images')->insert([
                'product_id' => $productId,
                'image_path' => $item['image'],
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 3. Insert ke tabel product_stocks (Stok Global)
            DB::table('product_stocks')->insert([
                'product_id' => $productId,
                'warehouse_id' => $warehouseId,
                'quantity' => rand(10, 50),
                'alert_limit' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 4. Insert ke tabel product_variants
            foreach ($item['variants'] as $v) {
                DB::table('product_variants')->insert([
                    'product_id' => $productId,
                    'brand' => $v['brand'],
                    'color' => $v['color'],
                    'size' => $v['size'],
                    'stock' => rand(5, 20),
                    'stock_alert' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 5. Insert ke tabel product_serials (Jika produk elektronik/khusus)
            if (isset($item['is_serial']) && $item['is_serial']) {
                for ($i = 0; $i < 5; $i++) {
                    DB::table('product_serials')->insert([
                        'product_id' => $productId,
                        'serial_number' => 'SN-' . strtoupper(Str::random(10)),
                        'status' => 'available',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}