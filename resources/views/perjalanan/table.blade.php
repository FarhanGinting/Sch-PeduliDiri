@extends('layouts.bone')
@section('title', 'Table')
@section('content')
    @include('components.navbar')

    <div class="table-responsive  mx-auto p-5">
        <table class="table">
            <thead>
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
                            <a href="student-detail/{{ $data->id }}">Detail</a> |
                            <a href="student-edit/{{ $data->id }}"> Edit</a> |
                            <a href="student-delete/{{ $data->id }}"> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
