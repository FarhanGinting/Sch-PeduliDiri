@extends('layouts.bone')
@section('title', 'Details')
@section('content')
    @include('components.navbar')
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-30">
                <div class="col-lg-6">
                    <h1 class="jumbo-header">
                        {{ $nama }}
                    </h1>
                    <p class="paragraph">
                        {{ $catatanDetail->lokasi }}
                    </p>
                </div>
                <div class="col-lg-6 header">

                    <h3 class="small-header">
                        {{ $catatanDetail->suhu }}
                    </h3>
                    <div class="rating">
                        🌡️
                    </div>
                </div>
            </div>
            <div class="row gallery">
                <div class="col-lg-6 mb-5">
                    <img src="{{ asset('storage/foto/' . $catatanDetail->image) }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="row house-informations">
                <div class="col-lg-7">

                    <h3 class="small-header mb-4">
                        Keterangan
                    </h3>
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ asset('images  /ic_wifi.svg') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mb-0">
                                            {{ $catatanDetail->tanggal }}
                                        </h3>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('images  /ic_card.svg') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mb-5">
                                            {{ $catatanDetail->waktu }}
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="small-header mb-2">
                        Aksi
                    </h3>
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="info">
                                        <a href="{{ route('index') }}" class="btn btn-secondary w-100 mt-3">Kembali</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <button type="submit" class="btn btn-danger w-100 mt-3">Hapus</button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <button type="submit" class="btn btn-warning w-100 mt-3">Edit Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
