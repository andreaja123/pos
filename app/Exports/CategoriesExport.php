<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CategoriesExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
{
    public function collection()
    {
        return Category::query()
            ->with('parent')
            ->withCount([
                'products as total_produk' => fn($q) => $q->where('is_active', true)
            ])
            ->withSum([
                'products as jumlah_stok' => fn($q) =>
                $q->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
            ], 'product_stocks.quantity')
            ->get()
            ->map(function ($category) {
                return [
                    $category->name,
                    $category->parent ? 'Sub Kategori' : 'Kategori Utama',
                    $category->parent?->name ?? '-',
                    $category->total_produk ?? 0,
                    $category->jumlah_stok ?? 0,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Kategori',
            'Tipe',
            'Parent',
            'Total Produk',
            'Jumlah Stok',
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

        /* ===== JUDUL ===== */
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'LAPORAN DATA KATEGORI PRODUK');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /* ===== HEADER ===== */
        $sheet->getStyle('A3:E3')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
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
        $sheet->getStyle("A4:E{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle("D4:E{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}