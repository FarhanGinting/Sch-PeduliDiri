@extends('layouts.bone')
@section('title', 'Edit')
@section('content')
    @include('components.navbar')
    <section class="section">
        <div class="row mx-auto p-5">

            <div class="d-flex justify-content-center">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-3 mb-4">Edit Data Perjalanan</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Vertical Form -->
                        <form method="POST" action="{{ route('catatan.update', $catatan->id) }}" class="row g-3 "
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-12">
                                <label class="form-label">Nama Perjalanan</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $catatan->nama }}" required>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                    value="{{ $catatan->tanggal }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu"
                                    value="{{ $catatan->waktu }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi"
                                    value="{{ $catatan->lokasi }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Suhu °C</label>
                                <input type="number" name="suhu" class="form-control" id="suhu"
                                    value="{{ $catatan->suhu }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" id="foto">
                            </div>

                            <div class="d-flex justify-content-center column-gap-4 mt-5 mb-4">
                                <a href="{{ route('catatan.show', $catatan->id) }}" class="btn btn-secondary"
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
