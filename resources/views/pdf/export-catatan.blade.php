@extends('layouts.bone')
@section('title', 'Export PDF Table')
@section('content')
    

    <div class="table-responsive  mx-auto p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($catatanexport as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->tanggal }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
