<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Mendapatkan pengguna yang sedang login
    $user = Auth::user();

    // Mengambil catatan perjalanan berdasarkan nik pengguna yang login
    $keyword = $request->keyword;

    $catatan = Catatan::where('user_id', $user->nik)
        ->where(function ($query) use ($keyword) {
            $query->where('nama', 'LIKE', '%' . $keyword . '%')
                ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal', 'LIKE', '%' . $keyword . '%');
        })
        ->get();

    // Mengirimkan data catatan ke view
    return view('perjalanan.index', ['catatanList' => $catatan, 'keyword' => $keyword]);
}


    public function showtable()
    {
        $user = Auth::user();
        $catatan = Catatan::where('user_id', $user->nik)->get();
        return view('perjalanan.table', ['catatanList' => $catatan]);
    }

    public function showimage()
    {
        $user = Auth::user();
        $catatan = Catatan::where('user_id', $user->nik)->get();
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
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengirimkan NIK user yang sedang login ke view
        return view('perjalanan.add', ['nik' => $user->nik]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save_url = '';
        if ($request->file('foto')) {
            $manager = New ImageManager(new Driver());
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $img = $manager->read($request->file('foto'));
            $img = $img->resize(1920,1080);

            $img->toJpeg(80)->save(base_path('public/uploads/perjalanan'. $newName));
            $save_url = 'uploads/perjalanan'. $newName;
        }
            $request['image'] = $save_url;
            $catatan = Catatan::create($request->all());
       
        
    
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
        $catatan = Catatan::findOrFail($id);

        // Jika ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($catatan->image) {
                Storage::delete('foto/' . $catatan->image);
            }
            $manager = New ImageManager(new Driver());
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $img = $manager->read($request->file('foto'));
            $img = $img->resize(1920,1080);

            $img->toJpeg(80)->save(base_path('public/uploads/perjalanan'. $newName));
            $save_url = 'uploads/perjalanan'. $newName;
            // Set nama foto baru pada request
            $request['image'] = $save_url;
            
        }
        // Lakukan update data catatan
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
        $user = Auth::user();
        $deleteCatatan = Catatan::where('user_id', $user->nik)->onlyTrashed()->get();
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
