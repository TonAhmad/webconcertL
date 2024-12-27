@extends('layout/admin')

@section('admin')
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ticket as $item)
                <tr>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection