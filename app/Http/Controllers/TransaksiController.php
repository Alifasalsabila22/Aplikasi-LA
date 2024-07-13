<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Kategori;
use App\Models\Rak;
use App\Models\Stock;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_old()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('transaksis.index', compact('transaksis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Transaksi::where('status', '=', 'in');

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('jumlah', 'like', $search_value)
                        ->orWhere('status', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('transaksis.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                    <a class="btn btn-info btn-sm me-1" href="' . route('transaksis.show', $row->id) . '"><i class="fas fa-eye"></i></a>
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>';
                    return $btn;
                })
                ->addColumn('judul', function ($row) {
                    return $row->barang->judul ?? 'N\A';
                })
                ->addColumn('kelas', function ($row) {
                    return $row->barang->kategori->kelas;
                })
                ->addColumn('jenjang', function ($row) {
                    return $row->barang->kategori->jenjang;
                })
                ->addColumn('lokasi_gudang', function ($row) {
                    return $row->rak->gudang->lokasi_gudang;
                })
                ->addColumn('stock_saat_ini', function ($row) {
                    return $row->total_stock;
                })
                ->addColumn('rak', function ($row) {
                    return $row->rak->no_rak;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transaksis.index');
    }


    public function lokasigudang(Request $request)
    {
        $id = $request->input('id');
        $raks = Rak::where('id', '=', $id)->with('gudang')->first();

        return response()->json([
            'data' => $raks
        ], 200);
    }

    public function Transaksi(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Transaksi::where('status', '=', 'out');

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('jumlah', 'like', $search_value)
                        ->orWhere('status', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '

                    <form action="' . route('transaksis.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                    <a class="btn btn-info btn-sm me-1" href="' . route('transaksis.show', $row->id) . '"><i class="fas fa-eye"></i></a>
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>';
                    return $btn;
                })
                ->addColumn('judul', function ($row) {
                    return $row->barang->judul ?? 'N\A';
                })
                ->addColumn('kelas', function ($row) {
                    return $row->barang->kategori->kelas;
                })
                ->addColumn('jenjang', function ($row) {
                    return $row->barang->kategori->jenjang;
                })
                ->addColumn('lokasi_gudang', function ($row) {
                    return $row->rak->gudang->lokasi_gudang;
                })
                ->addColumn('stock_saat_ini', function ($row) {
                    return $row->total_stock;
                })
                ->addColumn('rak', function ($row) {
                    return $row->rak->no_rak;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transaksis.out');
    }


    public function cetak_laporan_barang_masuk(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id_gudang = $request->id_gudang;
        $gudangs = Gudang::all();


        $data = Transaksi::whereBetween('tanggal_masuk', [$start_date, $end_date])
            ->whereHas('rak.gudang', function ($query) use ($id_gudang) {
                $query->where('id', $id_gudang);
            })
            ->where('status', 'in')
            ->get();

        return view('Transaksis.form_cetak_laporan', compact('data', 'gudangs', 'start_date', 'end_date', 'id_gudang'));
    }
    public function form_cetak_laporan(Request $request)
    {
        $data = [];
        $start_date = now();
        $end_date = now();
        $id_gudang = 0;
        $gudangs = Gudang::all();
        return view('Transaksis.form_cetak_laporan', compact('data', 'gudangs', 'start_date', 'end_date', 'id_gudang'));
    }
    public function form_cetak_laporan_keluar(Request $request)
    {
        $data = [];
        $gudangs = Gudang::all();
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id_gudang = $request->id_gudang;
        // dd($start_date);
        // dd($end_date);
        // dd($request);

        $dataKeluar = Transaksi::where('status', '=', 'out')
            ->whereBetween('tanggal_keluar', [$start_date, $end_date])
            ->get();





        // dd($data);
        return view('transaksis.form_cetak_laporan_keluar', compact('data', 'dataKeluar', 'gudangs', 'start_date', 'end_date', 'id_gudang'));
    }

    public function cetak_laporan_barang_keluar(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id_gudang = $request->id_gudang;
        $gudangs = Gudang::all();


        $datas = Transaksi::whereBetween('tanggal_masuk', [$start_date, $end_date])
            ->whereHas('rak.gudang', function ($query) use ($id_gudang) {
                $query->where('id', $id_gudang);
            })
            ->where('status', 'out')
            ->get();
        return view('Transaksis.cetak_laporan_keluar', compact('datas', 'gudangs'));
    }

    public function cetak_form_laporan(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $gudangs = $request->lokasi_gudang;

        dd($gudangs);

        $datas = Transaksi::whereBetween('tanggal_masuk', 'lokasi_gudang', [$start_date, $end_date, $gudangs])->where('status', 'in')->get();
        return view('Transaksis.cetak_laporan_masuk', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();
        $kategoris = Kategori::all();
        $raks = Rak::all();

        return view('transaksis.create', compact('barangs', 'gudangs', 'kategoris', 'raks'));
    }

    public function create_barang_keluar()
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();
        $kategoris = Kategori::all();
        $raks = Rak::all();


        return view('transaksis.create_transaksi_barang_keluar', compact('barangs', 'gudangs', 'kategoris', 'raks'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'tanggal_masuk' => 'required',
            'no_transaksi' => 'required',
            'id_barang' => 'required',
            // 'id_gudang' => 'required',
            // 'id_kategori' => 'required',
            // 'jumlah_masuk' => 'required',
            // 'jumlah_keluar' => 'required',
            'total_stock' => 'required',
            'status' => 'required',
        ]);

        // dd($request->all());

        $input = $request->all();
        $barang = Barang::find($input['id_barang']);
        // $input['id_kategori'] = $barang->id_kategori;

        if ($request->status == "In") {
            // $transaksi = Transaksi::where('id_barang', '=', $request->id_barang)->first();
            // dd($request->id_barang);
            $stock = Stock::where('id_barang', '=', $request->id_barang)->first();
            $res = intval($stock->stock) + intval($request->jumlah_masuk);
            // dd($stock);
            $input['total_stock'] = $res;

            $stock->update([
                'stock' => $res
            ]);
            // $transaksi->update([
            //     'total_stock' => $res
            // ]);
        }
        if ($request->status == "out") {
            // $transaksi = Transaksi::where('id_barang', '=', $request->id_barang)->first();
            $stock = Stock::where('id_barang', '=', $request->id_barang)->first();
            $res = intval($stock->stock) - intval($request->jumlah_keluar);
            $input['total_stock'] = $res;
            $stock->update([
                'stock' => $res
            ]);
            // $transaksi->update([
            //     'total_stock' => $res
            // ]);
        }

        Transaksi::create($input);


        if ($request->status == "In") {
            return redirect()->route('transaksis.index')->with('success', 'Transaction stored successfully');
        } else {
            return redirect()->route('transaksi.out')->with('success', 'Transaction stored successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();
        $kategoris = Kategori::all();
        return view('transaksis.edit', compact('transaksi', 'barangs', 'gudangs', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tanggal_masuk' => 'required',
            'no_transaksi' => 'required',
            'id_barang' => 'required',
            'id_gudang' => 'required',
            'id_kategori' => 'required',
            'jumlah_masuk' => 'required',
            //'jumlah_keluar' => 'required',
            'total_stock' => 'required',
            'status' => 'required',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksis.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // dd($transaksi);
        $transaksi->delete();
        if ($transaksi->status == "in") {
            return redirect()->route('transaksis.index')->with('success', 'Transaction Delete successfully');
        } else {
            return redirect()->route('transaksi.out')->with('success', 'Transaction Delete Success');
        }
    }
}
