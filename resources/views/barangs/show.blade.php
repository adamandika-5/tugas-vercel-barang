@extends('layouts.app', ['title' => 'Detail Barang'])

@section('content')
<div class="page-header">
    <div>
        <h2>Detail Barang</h2>
        <p>Informasi lengkap data barang.</p>
    </div>

    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card detail-card">
    <div class="detail-grid">
        <div class="detail-label">Nama Barang</div>
        <div class="detail-value" style="font-weight: 800; font-size: 1.3rem; background: linear-gradient(135deg, #A5B4FC, #C4B5FD); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $barang->nama_barang }}</div>

        <div class="detail-label">Kategori</div>
        <div class="detail-value"><span class="badge badge-sage">{{ $barang->kategori }}</span></div>

        <div class="detail-label">Stok</div>
        <div class="detail-value"><span class="font-mono-spec" style="font-size: 1.05rem;">{{ $barang->stok }}</span> <span style="color: #5B5888; font-size: 0.85rem;">unit</span></div>

        <div class="detail-label">Harga</div>
        <div class="detail-value" style="font-weight: 800; font-size: 1.2rem; color: #C4B5FD;">Rp{{ number_format($barang->harga, 0, ',', '.') }}</div>

        <div class="detail-label">Deskripsi</div>
        <div class="detail-value-desc">{{ $barang->deskripsi ?? '-' }}</div>
    </div>

    <div class="detail-action">
        <a href="{{ route('barangs.edit', $barang) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('barangs.destroy', $barang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection