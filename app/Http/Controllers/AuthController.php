<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('perjalanan.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Salah Memasukkan Email & Password');
        return redirect()->route('auth.index');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.index');
    }

    public function create()
    {
        return view('perjalanan.register');
    }

    public function store(Request $request)
    {
        $User = User::create($request->all());
        return redirect('/');
    }

    public function show($id)
    {
        $userDetails = User::findOrFail($id);
        return view('perjalanan.profile', ['userDetail' => $userDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('perjalanan.profile-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Jika ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('photo/' . $user->foto);
            }
            $manager = new ImageManager(new Driver());
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $img = $manager->read($request->file('photo'));
            $img = $img->resize(1920, 1080);
            $img->toJpeg(80)->save(base_path('public/uploads/perjalanan' . $newName));
            $save_url = 'uploads/perjalanan' . $newName;

            // Set nama foto baru pada model
            $user->foto = $save_url;
        }

        // Cek apakah password diisi atau tidak
        if ($request->has('password')) {
            // Update password dengan bcrypt
            $user->password = bcrypt($request->password);
        }

        // Lakukan update data pengguna tanpa memperbarui password
        $user->update($request->except(['password', 'photo']));

        Session::flash('status', 'success');
        Session::flash('message', 'Success Update Data');
        return redirect('/');
    }

    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Success Deleted Data');
        return redirect('/');
    }

}
