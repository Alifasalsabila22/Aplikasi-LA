<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Gudang::query();

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('kode_perwakilan_regional', 'like', $search_value)
                        ->orWhere('lokasi_gudang', 'like', $search_value)
                        ->orWhere('no_gudang', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('gudangs.destroy', $row->id) . '" method="POST">
                        <a class="btn btn-info" href="' . route('gudangs.show', $row->id) . '"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary" href="' . route('gudangs.edit', $row->id) . '"><i class="fas fa-edit"></i></a>
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('gudangs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_perwakilan_regional' => 'required',
            'lokasi_gudang' => 'required',
            'no_gudang' => 'required',
        ]);

        Gudang::create($request->all());

        return redirect()->route('gudangs.index')->with('success', 'Gudang created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Gudang $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        return view('gudangs.show', compact('gudang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Gudang $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        return view('gudangs.edit', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gudang $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'kode_perwakilan_regional' => 'required',
            'lokasi_gudang' => 'required',
            'no_gudang' => 'required',
        ]);

        $gudang->update($request->all());

        return redirect()->route('gudangs.index')->with('success', 'Gudang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Gudang $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        $gudang->delete();
        return redirect()->route('gudangs.index')->with('success', 'Gudang deleted successfully');
    }
}
