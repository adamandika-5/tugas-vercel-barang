@extends('layouts.app', ['title' => 'Edit Barang'])

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Barang</h2>
        <p>Perbarui data barang yang sudah tersimpan.</p>
    </div>

    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card form-card">
    <form action="{{ route('barangs.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')

        @include('barangs.form', ['button' => 'Update'])
    </form>
</div>
@endsection