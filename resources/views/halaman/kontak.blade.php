@extends('layout/aplikasi')

@section('kontak')
    <h1>Kontak Pakai Section</h1>
    <h1>{{ $judul }}</h1>
    <p>
        <ul>
            <li>{{ $kontak ['email'] }}</li>
            <li>{{ $kontak ['no hp'] }}</li>
        </ul>
    </p>
@endsection
