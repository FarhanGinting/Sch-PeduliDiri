@extends('layouts.bone')
@section('title', 'Detail Profile')
@section('content')
    @include('components.navbar')
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-8">
                <div class="col-lg-6">
                    <h1 class="jumbo-header">
                        {{ $userDetail->nama }}
                    </h1>
                    <p class="paragraph">
                        {{ $userDetail->email }}
                    </p>
                </div>
                <div class="col-lg-6 header">

                    <h3 class="small-header">
                        NIK : {{ $userDetail->nik }}
                    </h3>
                </div>
            </div>
            <div class="row gallery justify-content-center">
                <div class="col-lg-6 mb-5">
                    @if ($userDetail->foto != '')
                        <img src="{{ asset($userDetail->foto) }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('images/profile.gif') }}" class="img-fluid dropdown-toggle" width="100%"
                            alt="Default User Photo">
                    @endif
                </div>
            </div>

            <div class="row house-informations justify-content-center">
                <div class="col-lg-7">
                    <h3 class="small-header mb-2 mt-4">
                        Aksi
                    </h3>
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="{{ route('index') }}" class="btn btn-secondary w-100 mt-3">Kembali</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <form action="{{ route('auth.destroy', $userDetail->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger w-100 mt-3" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="{{ route('auth.edit', $userDetail->id) }}" type="submit"
                                            class="btn btn-warning w-100 mt-3">Edit Data</a>
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
