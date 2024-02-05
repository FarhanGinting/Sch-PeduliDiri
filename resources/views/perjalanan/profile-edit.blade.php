@extends('layouts.bone')
@section('title', 'Edit Profile')
@section('content')
    @include('components.navbar')
    <section class="section">
        <div class="row mx-auto p-5">

            <div class="d-flex justify-content-center">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-3 mb-4">Edit Data Profile</h5>
                        <!-- Vertical Form -->
                        <form method="POST" action="{{ route('auth.update', $user->id) }}" class="row g-3 "
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" required value="{{ $user->nik }}" readonly>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" name="email" id="email" class="form-control" required value="{{ $user->email }}">
                                    <div class="invalid-feedback">Tolong masukan email.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="nama" id="nama" class="form-control" required value="{{ $user->nama }}">
                                    <div class="invalid-feedback">Tolong masukan nama.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                                <div class="invalid-feedback">Tolong masukkan password!</div>
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label">Foto</label>
                                <input type="file" name="photo" class="form-control" id="photo">
                            </div>

                            <div class="d-flex justify-content-center column-gap-4 mt-5 mb-4">
                                <a href="{{ route('auth.show', $user->id) }}" class="btn btn-secondary"
                                    style="float: right;">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
