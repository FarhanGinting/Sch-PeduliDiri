@extends('layouts.bone')
@section('title', 'Table')
@section('content')
    @include('components.navbar')

    <div class="table-responsive  mx-auto p-5">
        <table class="table">
            <thead>
                <a href="table/export-pdf" class="btn btn-primary mb-4">Export ke PDF</a>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catatanList as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>
                            <a href="{{ route('catatan.show', $data->id) }}">Detail</a> 
                            |
                            <a href="{{ route('catatan.delete', $data->id) }}"> Delete</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
