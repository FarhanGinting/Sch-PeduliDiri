@extends('layouts.bone')
@section('title', 'Login')
@section('content')

    <div class="container-fluid">
        <div class="row min-vh-100">
            @if (Session::has('status'))
                <!-- Modal -->
                <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel">Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                {{ Session::get('message') }}
                                @if (Session::get('status') === 'failed')
                                    <img src="images/alert.gif" alt="Alert GIF" width="65%" class="mx-auto">
                                @elseif (Session::get('status') === 'success')
                                    <img src="images/double-check.gif" alt="Double Check GIF" width="65%"
                                        class="mx-auto">
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-4 d-flex align-items-center justify-content-start">
                <div class="card my-auto border-0"> <!-- Remove text-center class -->
                    <div class="card-body">
                        <h5 class="card-title text-center pb-3 fs-4">Masuk Dengan Akun Anda</h5>
                        <form class="row g-3 needs-validation" action="{{ route('auth.authenticating') }}" form
                            role="form" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                    <div class="invalid-feedback">Tolong masukan email</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <div class="invalid-feedback">Tolong masukan Password</div>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 mb-3" type="submit">Login</button>
                            </div>
                        </form>
                        <p class="text-center small mt-2">
                            <a href="{{ route('auth.create') }}" class="">Tidak Punya Akun Register
                                Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 d-flex align-items-center justify-content-center overflow-hidden"> <!-- Mengubah lebar kolom menjadi 8 dan menambahkan class justify-content-center dan overflow-hidden -->
                <img src="{{ asset('images/login.jpg') }}" alt="Login Image" class="img-fluid w-100 h-100" style="border-radius: 20px;">
            </div>
        </div>
    </div>

@endsection
