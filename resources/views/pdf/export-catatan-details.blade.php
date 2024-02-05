@extends('layouts.bone')
@section('title', 'Details')
@section('content')
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-8">
                <div class="col-lg-6">
                    <h1 class="jumbo-header">
                        {{ $catatanDetail->nama }}
                    </h1>
                    <p class="paragraph">
                        {{ $catatanDetail->lokasi }}
                    </p>
                </div>
                <div class="col-lg-6 header">
                    
                </div>
            </div>
            <div class="row gallery justify-content-center">
                <div class="col-lg-6 mb-5">
                    @if ($catatanDetail->image != '')
                    <img src="{{ asset($catatanDetail->image) }}" class="img-fluid" style="max-width: 100%; height: auto;" alt="">
                    @else
                    <img src="{{ asset('images/image-not.png') }}" class="img-fluid"  style="max-width: 100%; height: auto;" alt="">
                @endif
                </div>
            </div>

            <div class="row house-informations justify-content-center">
                <div class="col-lg-7">
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row ">
                                <div class="col-lg-6">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            Tanggal Perjalanan : {{ $catatanDetail->tanggal }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            Waktu Perjalanan : {{ $catatanDetail->waktu }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            Suhu Perjalanan : {{ $catatanDetail->suhu }} °C
                                        </h3>
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
