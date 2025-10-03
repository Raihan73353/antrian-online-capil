@extends('template_admin.layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:80vh;">
    <div class="card shadow p-5 text-center" style="width:400px;">
        <h3 class="mb-3">Nomor Antrian Anda</h3>
        <h1 class="display-1 font-weight-bold">{{ $antrean->nomor }}</h1>
        <p>Jam Ambil: {{ $antrean->jam }}</p>
        <p>Harap tunggu hingga nomor Anda dipanggil</p>
    </div>
</div>
@endsection
