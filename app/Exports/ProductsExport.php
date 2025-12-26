<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\{Alignment, Border, Fill};

class ProductsExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
{
    public function collection()
    {
        return Product::query()
            ->with([
                'category',
                'variants',
                'stocks.warehouse',
                'serials',
            ])
            ->withSum('stocks', 'quantity')
            ->get()
            ->map(function ($product) {

                /* ===== VARIANT ===== */
                $variants = $product->variants->map(function ($v) {
                    return $v->full_name . " (Stok: {$v->stock})";
                })->implode("\n");

                /* ===== STOK PER GUDANG ===== */
                $warehouses = $product->stocks->map(function ($s) {
                    return "{$s->warehouse->name}: {$s->quantity}";
                })->implode("\n");

                /* ===== SERIAL ===== */
                $serials = $product->serials
                    ->pluck('serial_number')
                    ->take(5)
                    ->implode(', ');

                return [
                    'nama'          => $product->name,
                    'kode'          => $product->code,
                    'barcode'       => $product->barcode,
                    'kategori'      => $product->category->name ?? '-',
                    'stok_total'    => $product->stocks_sum_quantity ?? 0,
                    'harga_beli'    => $product->cost_price,
                    'harga_jual'    => $product->sell_price,
                    'laba_unit'     => $product->sell_price - $product->cost_price,
                    'nilai_aset'    => ($product->stocks_sum_quantity ?? 0) * $product->cost_price,
                    'varian'        => $variants ?: '-',
                    'stok_gudang'   => $warehouses ?: '-',
                    'serial'        => $serials ?: '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Kode',
            'Barcode',
            'Kategori',
            'Total Stok',
            'Harga Beli',
            'Harga Jual',
            'Laba / Unit',
            'Total Nilai Aset',
            'Varian Produk',
            'Stok Per Gudang',
            'Serial Number',
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();

        /* ===== JUDUL ===== */
        $sheet->mergeCells("A1:{$highestCol}1");
        $sheet->setCellValue('A1', 'LAPORAN DATA PRODUK');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /* ===== HEADER ===== */
        $sheet->getStyle("A3:{$highestCol}3")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '374151'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        /* ===== DATA ===== */
        $sheet->getStyle("A4:{$highestCol}{$highestRow}")->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_TOP,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Kolom angka center
        $sheet->getStyle("E4:I{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}
