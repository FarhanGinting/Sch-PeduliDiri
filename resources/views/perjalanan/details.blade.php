@extends('layouts.bone')
@section('title', 'Details')
@section('content')
    @include('components.navbar')
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-8">
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
                        {{ $catatanDetail->suhu }}°C
                    </h3>
                    <div class="rating">
                        🌡️
                    </div>
                </div>
            </div>
            <div class="row gallery justify-content-center">
                <div class="col-lg-6 mb-5">
                    @if ($catatanDetail->image != '')
                        <img src="{{ asset($catatanDetail->image) }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('images/image-not.png') }}" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
            
            <div class="row house-informations justify-content-center">
                <div class="col-lg-7">

                    <h3 class="small-header mb-4 ">
                        Keterangan
                    </h3>
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row ">
                                <div class="col-lg-6">
                                    <img src="{{ asset('images/date.png') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            {{ $catatanDetail->tanggal }}
                                        </h3>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('images/time.png') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            {{ $catatanDetail->waktu }}
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="small-header mb-2 mt-4">
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
                                        <form action="/destroy/{{ $catatanDetail->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger w-100 mt-3" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <a href="/details/{{ $catatanDetail->id }}/{{ Str::slug($catatanDetail->nama, '-') }}/edit"
                                            type="submit" class="btn btn-warning w-100 mt-3">Edit Data</a>
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
