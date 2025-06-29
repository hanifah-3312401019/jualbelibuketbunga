<?php

namespace App\Exports;

use App\Models\Pesanan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapTotalOmzetExport implements FromArray, WithHeadings
{
    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function array(): array
    {
        $query = Pesanan::where('status', 'paid');

        if ($this->filter == 'mingguan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($this->filter == 'bulanan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }

        $total = $query->sum('total');

        return [
            [
                'Periode' => ucfirst($this->filter),
                'Total Pendapatan' => $total,
            ]
        ];
    }

    public function headings(): array
    {
        return ['Periode', 'Total Pendapatan'];
    }
}
