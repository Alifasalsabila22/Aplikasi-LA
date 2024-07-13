<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kategori-list|kategori-create|kategori-edit|kategori-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kategori-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kategori-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kategori-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Kategori::select('*');

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('jenjang', 'like', $search_value)
                        ->orWhere('kelas', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('id', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('kategoris.destroy', $row->id) . '" method="POST">
                        <a class="btn btn-info" href="' . route('kategoris.show', $row->id) . '">Show</a>
                        <a class="btn btn-primary" href="' . route('kategoris.edit', $row->id) . '">Edit</a>
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kategoris.index');
    }

    /**,
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('kategoris.create');
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
            'jenjang' => 'required',
            'kelas' => 'required',
        ]);

        $input = $request->all();
        $input["created_by"] = "1";
        $input["updated_by"] = "1";
        $input["deleted_by"] = "1";

        Kategori::create($input);
        return redirect()->route('kategoris.index')->with('success', 'Kategori created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'jenjang' => 'required',
            'kelas' => 'required',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategoris.index')->with('success', 'Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Kategori deleted successfully');
    }
}
