@extends('layouts.app', ['title' => 'Tambah Barang'])

@section('content')
<div class="page-header">
    <div>
        <h2>Tambah Barang</h2>
        <p>Isi form berikut untuk menambahkan data barang baru.</p>
    </div>

    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card form-card">
    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf

        @include('barangs.form', ['button' => 'Simpan'])
    </form>
</div>
@endsection