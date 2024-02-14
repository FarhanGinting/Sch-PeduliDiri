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


                        <form method="POST" action="{{ route('catatan.store') }}" class="row g-3 "
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">NIK</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">👤</span>
                                    <input type="text" name="user_id" id="class_id" class="form-control"
                                        value="{{ $nik }}" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nama Perjalanan</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" id="nama" value="{{ old('nama') ?: '' }}"
                                    required>
                                @if ($errors->has('nama'))
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" id="tanggal" value="{{ old('tanggal') ?: '' }}"
                                    required>
                                @if ($errors->has('tanggal'))
                                    <p class="text-danger">{{ $errors->first('tanggal') }}</p>
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu" value="{{ old('waktu') ?: '' }}" 
                                required> 
                            </div>

                            <div class="col-12">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi"
                                    class="form-control form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" id="lokasi" value="{{ old('lokasi') ?: '' }}"
                                    required>
                                @if ($errors->has('lokasi'))
                                    <p class="text-danger">{{ $errors->first('lokasi') }}</p>
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label">Suhu °C (Lokasi)</label>
                                <input type="number" name="suhu"
                                    class="form-control form-control {{ $errors->has('suhu') ? 'is-invalid' : '' }}" id="suhu" value="{{ old('suhu') ?: '' }}"
                                    required>
                                @if ($errors->has('suhu'))
                                    <p class="text-danger">{{ $errors->first('suhu') }}</p>
                                @endif
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
