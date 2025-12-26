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

class SingleCategoryExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
{
    protected int $categoryId;

    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function collection()
    {
        $category = Category::with([
            'products.stocks'
        ])
            ->withCount([
                'products as total_produk' => fn($q) => $q->where('is_active', true)
            ])
            ->withSum([
                'products as jumlah_stok' => fn($q) =>
                $q->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
            ], 'product_stocks.quantity')
            ->findOrFail($this->categoryId);

        return collect([
            [
                $category->name,
                $category->parent ? 'Sub Kategori' : 'Kategori Utama',
                $category->parent?->name ?? '-',
                $category->total_produk ?? 0,
                $category->jumlah_stok ?? 0,
            ]
        ]);
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
        return 'A4';
    }

    public function styles(Worksheet $sheet)
    {
        /* ===== JUDUL ===== */
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'LAPORAN DATA KATEGORI');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /* ===== HEADER ===== */
        $sheet->getStyle('A4:E4')->applyFromArray([
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
        $sheet->getStyle('A5:E5')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('D5:E5')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}