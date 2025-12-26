<?php

namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SuppliersExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithCustomStartCell
{
    public function collection()
    {
        return Supplier::query()
            ->latest() // Urutkan dari yang terbaru (opsional)
            ->get()
            ->map(function ($supplier) {
                // Menggabungkan alamat agar rapi di satu sel
                $fullAddress = $supplier->address;
                if ($supplier->city) $fullAddress .= ', ' . $supplier->city;
                if ($supplier->region) $fullAddress .= ', ' . $supplier->region;
                if ($supplier->postal_code) $fullAddress .= ' ' . $supplier->postal_code;

                return [
                    'company'   => $supplier->company,
                    'name'      => $supplier->name,
                    'email'     => $supplier->email,
                    'phone'     => $supplier->phone,
                    'tax_id'    => $supplier->tax_id ?? '-',
                    'address'   => $fullAddress ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Perusahaan',
            'Nama Kontak',
            'Email',
            'Telepon',
            'NPWP',
            'Alamat Lengkap',
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        // Kita menggunakan kolom A sampai F (6 Kolom)

        /* ===== Judul ===== */
        $sheet->mergeCells('A1:F1'); // Merge sampai kolom F
        $sheet->setCellValue('A1', 'LAPORAN DATA SUPPLIER');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /* ===== Header ===== */
        $sheet->getStyle('A3:F3')->applyFromArray([
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
                'startColor' => ['rgb' => '374151'], // corporate gray (sama dengan gudang)
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        /* ===== Data ===== */
        $sheet->getStyle("A4:F{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_TOP, // Agar teks alamat panjang rapi di atas
            ],
        ]);

        // Center Kolom Telepon (D) dan NPWP (E) agar lebih rapi
        $sheet->getStyle("D4:E{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}