<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RakController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Rak::query();

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where('no_rak', 'like', $search_value);
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('raks.destroy', $row->id) . '" method="POST">
                        <a class="btn btn-info" href="' . route('raks.show', $row->id) . '"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary" href="' . route('raks.edit', $row->id) . '"><i class="fas fa-edit"></i></a>
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>';
                    return $btn;
                })->addColumn('lokasi_gudang', function ($row) {
                    return $row->gudang->lokasi_gudang;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('raks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        $gudangs = Gudang::all();
        return view('raks.create', compact('barangs', 'kategoris', 'gudangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rak' => 'required',
            // 'id_barang' => 'required',
            //'id_kategori' => 'required',
            'id_gudang' => 'required',
        ]);

        $input = $request->all();
        // $barang = Barang::find($input['id_barang']);
        // $input['id_kategori'] = $barang->id_kategori;
        $input["created_by"] = "1";
        $input["updated_by"] = "1";
        $input["deleted_by"] = "1";

        Rak::create($input);

        return redirect()->route('raks.index')->with('success', 'Rak created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        return view('raks.show', compact('rak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rak $rak)
    {
        $gudangs = Gudang::all();
        return view('raks.edit', compact('gudangs','rak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rak $rak)
    {
        $request->validate([
            'no_rak' => 'required',
            'id_gudang' => 'required',
        ]);

        $rak->update($request->all());

        return redirect()->route('raks.index')->with('success', 'Rak updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rak $rak)
    {
        $rak->delete();
        return redirect()->route('raks.index')->with('success', 'Rak deleted successfully');
    }
}
