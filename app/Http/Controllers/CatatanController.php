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
    public function details($slug)
    {
        
        return view('perjalanan.details', compact('slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catatan = User::select('id', 'nama')->get();
        return view('perjalanan.add',  ['catatan' => $catatan]);
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
    public function edit(Catatan $catatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catatan $catatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catatan $catatan)
    {
        //
    }
}
