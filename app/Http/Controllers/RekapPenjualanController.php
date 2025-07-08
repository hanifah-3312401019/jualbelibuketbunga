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
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $query = Pesanan::where('status', 'paid');

        // Apply date filters
        if ($filter == 'mingguan') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($filter == 'bulanan') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfMonth(), 
                Carbon::now()->endOfMonth()
            ]);
        } elseif ($filter == 'custom' && $dateFrom && $dateTo) {
            $query->whereBetween('created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ]);
        }

        $totalPendapatan = $query->sum('total');
        $rekapPenjualan = $query->with('detail.produk')
                               ->orderBy('created_at', 'desc')
                               ->get();

        return view('pages.rekap_penjualan', compact(
            'filter', 
            'totalPendapatan', 
            'rekapPenjualan'
        ));
    }

    public function exportPdf(Request $request)
    {
        $filter = $request->input('filter', 'mingguan');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $query = Pesanan::where('status', 'paid');

        // Apply same date filters as index
        if ($filter == 'mingguan') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($filter == 'bulanan') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfMonth(), 
                Carbon::now()->endOfMonth()
            ]);
        } elseif ($filter == 'custom' && $dateFrom && $dateTo) {
            $query->whereBetween('created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ]);
        }

        $totalPendapatan = $query->sum('total');
        $rekapPenjualan = $query->with('detail.produk')
                               ->orderBy('created_at', 'desc')
                               ->get();

        // Generate filename based on filter
        $filename = 'Rekap-Penjualan-' . $filter;
        if ($filter == 'custom' && $dateFrom && $dateTo) {
            $filename .= '-' . Carbon::parse($dateFrom)->format('d-m-Y') . 
                        '-to-' . Carbon::parse($dateTo)->format('d-m-Y');
        }

        $pdf = PDF::loadView('pages.export_pdf', compact(
            'filter', 
            'totalPendapatan', 
            'rekapPenjualan',
            'dateFrom',
            'dateTo'
        ));

        return $pdf->download($filename . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $filter = $request->input('filter', 'mingguan');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        
        // Generate filename based on filter
        $filename = 'Rekap-Penjualan-' . $filter;
        if ($filter == 'custom' && $dateFrom && $dateTo) {
            $filename .= '-' . Carbon::parse($dateFrom)->format('d-m-Y') . 
                        '-to-' . Carbon::parse($dateTo)->format('d-m-Y');
        }

        return Excel::download(
            new RekapGabunganExport($filter, $dateFrom, $dateTo), 
            $filename . '.xlsx'
        );
    }
}