<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Stock;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_old()
    {
        $stocks = Stock::latest()->paginate(5);
        return view('stocks.index', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Stock::query();

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where('stock', 'like', $search_value);
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('stocks.destroy', $row->id) . '" method="POST">
                        <a class="btn btn-info" href="' . route('stocks.show', $row->id) . '"><i class="fas fa-eye"></i></a></a>
                        <a class="btn btn-primary" href="' . route('stocks.edit', $row->id) . '">Edit</a>
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>';
                    return $btn;
                })->addColumn('judul', function ($row) {
                    return $row->barang->judul;
                })->addColumn('kelas', function ($row) {
                    return $row->Kategori->kelas;
                })->addColumn('jenjang', function ($row) {
                    return $row->Kategori->jenjang;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('stocks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('stocks.create', compact('barangs', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            //'id_kategori' => 'required',
            'stock' => 'required',
        ]);

        $input = $request->all();
        $barang = Barang::find($input['id_barang']);
        $input['id_kategori'] = $barang->id_kategori;
        $input['created_by'] = 1; // Example hardcoded values, replace with actual logic
        $input['updated_by'] = 1;
        $input['deleted_by'] = 1;

        Stock::create($input);

        return redirect()->route('stocks.index')->with('success', 'Stock created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('stocks.edit', compact('stock', 'barangs', 'kategoris'));
    }

    public function getstockbarangbyidbarang(Request $request)
    {
        $input = $request->all();
        $datastock = Stock::where('id_barang', '=', $input['id'])->first();
        return response()->json([
            'data' => $datastock
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_kategori' => 'required',
            'stock' => 'required',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')
            ->with('success', 'Stock deleted successfully');
    }
}
