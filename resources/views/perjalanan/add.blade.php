@extends('layouts.bone')
@section('title', 'Add Travel Noted')
@section('content')
    @include('components.navbar')

    <section class="section">
        <div class="row mx-auto p-5">

            <div class="d-flex justify-content-center">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-3 mb-4">Form Perjalanan</h5>

                        <!-- Vertical Form -->
                        <form method="POST" action="store" class="row g-3 " enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">NIK</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">👤</span>
                                    <input type="text" name="user_id" id="class_id" class="form-control" value="{{ $nik }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label">Nama Perjalanan</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi"
                                    placeholder="Masukkan lokasi" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Suhu °C</label>
                                <input type="number" name="suhu" class="form-control" id="suhu"
                                    placeholder="Masukkan suhu" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" id="foto">
                            </div>

                            <div class="d-flex justify-content-center column-gap-4 mt-5 mb-4">
                                <a href="{{ route('index') }}" class="btn btn-secondary" style="float: right;">Cancel</a>
                                <button type="submit" name="simpan" class="btn btn-primary" value="Simpan">Submit</button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
