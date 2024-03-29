@extends('layouts.bone')
@section('title', 'Image List')
@section('content')
    @include('components.navbar')

    <div class="row gallery">
        @foreach ($catatanList as $item)
            @if ($item->image != '')
                <div class="col-lg-4 mb-4">
                    <div class="gallery-item">
                        <a href="{{ route('catatan.show', $item->id) }}">
                        <img src="{{ $item->image }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            @else
            @endif
        @endforeach
    </div>
@endsection
