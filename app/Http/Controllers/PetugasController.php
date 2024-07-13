<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_old()
    {
        $petugas = Petugas::latest()->paginate(5);
        return view('petugas.index', compact('petugas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = Petugas::query();

            if ($request->has('sSearch') && $request->sSearch != '') {
                $search_value = '%' . $request->sSearch . '%';
                $query_data->where(function ($query) use ($search_value) {
                    $query->where('nama', 'like', $search_value)
                        ->orWhere('no_hp', 'like', $search_value)
                        ->orWhere('alamat', 'like', $search_value)
                        ->orWhere('jenis_kelamin', 'like', $search_value)
                        ->orWhere('foto', 'like', $search_value);
                });
            }

            $data = $query_data->orderBy('nama', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <form action="' . route('petugas.destroy', $row->id) . '" method="POST">
                        <a class="btn btn-info" href="' . route('petugas.show', $row->id) . '">Show</a>
                        <a class="btn btn-primary" href="' . route('petugas.edit', $row->id) . '">Edit</a>
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('petugas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $input["created_by"] = "1";
        $input["update_by"] = "1";
        $input["deleted_by"] = "1";

        Petugas::create($input);

        return redirect()->route('petugas.index')->with('success', 'Petugas created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        return view('petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $petugas->update($input);

        return redirect()->route('petugas.index')->with('success', 'Petugas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully');
    }
}
