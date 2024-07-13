<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function printReport(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $id_gudang = $request->input('id_gudang');

        $data = Transaksi::whereBetween('tanggal_masuk', [$start_date, $end_date])
            ->whereHas('rak.gudang', function ($query) use ($id_gudang) {
                $query->where('id', $id_gudang);
            })
            ->where('status', 'in')
            ->get();

        return view('Transaksis.report_print_masuk', compact('start_date', 'end_date', 'data'));
    }

    public function printReportOut(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $id_gudang = $request->input('id_gudang');

        $data = Transaksi::whereBetween('tanggal_keluar', [$start_date, $end_date])
            ->whereHas('rak.gudang', function ($query) use ($id_gudang) {
                $query->where('id', $id_gudang);
            })
            ->where('status', 'out')
            ->get();

        return view('Transaksis.report_print_keluar', compact('start_date', 'end_date', 'data'));
    }
}
