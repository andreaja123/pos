<?php

namespace App\Exports;

use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class WarehousesExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
{
    public function collection()
    {
        return Warehouse::query()
            ->withCount([
                // total produk unik per gudang
                'stocks as total_produk' => function ($q) {
                    $q->select(\DB::raw('COUNT(DISTINCT product_id)'));
                },
            ])
            ->withSum('stocks as jumlah_stok', 'quantity')
            ->get()
            ->map(function ($warehouse) {
                return [
                    'name'          => $warehouse->name,
                    'location'      => $warehouse->location,
                    'type'          => $warehouse->type,
                    'total_produk'  => $warehouse->total_produk ?? 0,
                    'jumlah_stok'   => $warehouse->jumlah_stok ?? 0,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Gudang',
            'Lokasi',
            'Tipe Gudang',
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

        /* ===== Judul ===== */
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'LAPORAN DATA GUDANG');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /* ===== Header ===== */
        $sheet->getStyle('A3:E3')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '374151'], // corporate gray
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        /* ===== Data ===== */
        $sheet->getStyle("A4:E{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Center angka
        $sheet->getStyle("D4:E{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}