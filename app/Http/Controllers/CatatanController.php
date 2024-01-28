<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\User;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatan = Catatan::all();
        return view('perjalanan.index', ['catatanList' => $catatan]);
    }

    public function showtable()
    {
        $catatan = Catatan::all();
        return view('perjalanan.table', ['catatanList' => $catatan]);
    }

    public function showimage()
    {
        $catatan = Catatan::all();
        return view('perjalanan.image-list', ['catatanList' => $catatan]);
    }

    public function details($id, $nama)
    {
        $catatanDetails = Catatan::findOrFail($id);
        return view('perjalanan.details', ['catatanDetail' => $catatanDetails], compact('nama'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catatan = User::select('id', 'nama')->get();
        return view('perjalanan.add', ['catatan' => $catatan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newName = '';
        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto', $newName);
        }
        $request['image'] = $newName;
        $catatan = Catatan::create($request->all());
        // if ($catatan) {
        //     Session::flash('status', 'Success');
        //     Session::flash('message', 'Add New Catatan Successfully created ! ');
        // }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catatan $catatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $catatan = Catatan::findOrFail($id);
        return view('perjalanan.edit', ['catatan' => $catatan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $newName = '';
        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto', $newName);
        }
        $request['image'] = $newName;
        $catatan = Catatan::findOrFail($id);
        $catatan->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $Confirmcatatan = Catatan::findOrFail($id);
        return view('perjalanan.delete', ['catatan' => $Confirmcatatan]);

    }

    public function destroy($id)
    {
        $deleteCatatan = Catatan::findOrFail($id);
        $deleteCatatan->delete();

        return redirect('/');
    }

    public function showdeleted()
    {
        $deleteCatatan = Catatan::onlyTrashed()->get();
        return view('perjalanan.delete-list', ['catatan' => $deleteCatatan]);
    }

    public function restore($id)
    {
        $deleteCatatan = Catatan::withTrashed()->where('id', $id)->restore();
        // if ($deleteCatatan) {
        //     Session::flash('status', 'Success');
        //     Session::flash('message', 'Restore Successfully created ! ');
        // }
        return redirect('/');
    }
}
