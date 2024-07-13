<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Stock;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::all();
        if ($request->ajax()) {
            $query_data = Barang::query();

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('kode_buku', 'like', $search_value)
                        ->orWhere('judul', 'like', $search_value)
                        ->orWhere('kelas', 'like', $search_value)
                        ->orWhere('penerbit', 'like', $search_value)
                        ->orWhere('tahun_terbit', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('barangs.destroy', $row->id) . '" method="POST" style="display:inline;">
                        <a class="btn btn-info" href="' . route('barangs.show', $row->id) . '"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary" href="' . route('barangs.edit', $row->id) . '"><i class="fas fa-edit"></i></a>
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>';
                    return $btn;
                })->addColumn('jenjang', function ($row) {
                    return $row->kategori->jenjang;
                })->addColumn('kelas', function ($row) {
                    return $row->kategori->kelas;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('barangs.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barangs.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'id_kategori' => 'required',
        ]);

        Barang::create($request->all());
        return redirect()->route('barangs.index')->with('success', 'Barang created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barangs.edit', compact('barang', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'id_kategori' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $stock = Stock::where('id_barang','=',$barang->id)->delete();
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Gudang deleted successfully');
        // if ($barang->stocks) {
        //     // Delete related records in the 'stocks' table first
        //     foreach ($barang->stocks as $stock) {
        //         $stock->delete();
        //     }

        //     $barang->delete();
        //     return redirect()->route('barangs.index')->with('success', 'Barang deleted successfully');
        // }
    }
}
