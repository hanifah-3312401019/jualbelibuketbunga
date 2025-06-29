<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapGabunganExport;

class RekapPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'mingguan');

        $query = Pesanan::where('status', 'paid');

        if ($filter == 'mingguan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter == 'bulanan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }

        $totalPendapatan = $query->sum('total');

        $rekapPenjualan = $query->get();

        return view('pages.rekap_penjualan', compact('filter', 'totalPendapatan', 'rekapPenjualan'));
    }

    public function exportPdf(Request $request)
    {
        $filter = $request->input('filter', 'mingguan');

        $query = Pesanan::where('status', 'paid');

        if ($filter == 'mingguan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter == 'bulanan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }

        $totalPendapatan = $query->sum('total');
        $rekapPenjualan = $query->get();

        $pdf = PDF::loadView('pages.export_pdf', compact('filter', 'totalPendapatan', 'rekapPenjualan'));

        return $pdf->download('Rekap-Penjualan-' . $filter . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $filter = $request->input('filter', 'mingguan');
        return Excel::download(new RekapGabunganExport($filter), 'Rekap-Penjualan-' . $filter . '.xlsx');
    }
}
