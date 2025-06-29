<?php

namespace App\Exports;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapGabunganExport implements FromView
{
    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function view(): View
    {
        $query = Pesanan::where('status', 'paid');

        if ($this->filter == 'mingguan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($this->filter == 'bulanan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }

        $rekapPenjualan = $query->get();
        $totalPendapatan = $query->sum('total');

        return view('pages.export_excel', [
            'rekapPenjualan' => $rekapPenjualan,
            'totalPendapatan' => $totalPendapatan,
            'filter' => $this->filter,
        ]);
    }
}
