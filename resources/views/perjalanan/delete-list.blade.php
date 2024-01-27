@extends('layouts.bone')
@section('title', 'Restore Data')
@section('content')
    @include('components.navbar')

    <div class="table-responsive  mx-auto p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Tanggal | Waktu Hapus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catatan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->deleted_at }}</td>
                        <td>
                            <a href="/{{ $data->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
