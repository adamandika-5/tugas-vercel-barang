@extends('layouts.app', ['title' => 'Data Barang'])

@section('content')
<div class="page-header">
    <div>
        <h2>Data Barang</h2>
        <p>Halaman ini menampilkan data barang dari basis data.</p>
    </div>

    <a href="{{ route('barangs.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th style="width: 120px;">Stok</th>
                    <th style="width: 180px;">Harga</th>
                    <th style="width: 260px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td><span class="font-mono-spec">{{ $loop->iteration }}</span></td>
                        <td><strong class="item-title">{{ $barang->nama_barang }}</strong></td>
                        <td><span class="badge {{ $loop->index % 2 === 0 ? 'badge-sage' : 'badge-clay' }}">{{ $barang->kategori }}</span></td>
                        <td><span style="font-weight: 700; color: #A5B4FC;">{{ $barang->stok }}</span> <span style="font-size: 0.8rem; color: #5B5888;">unit</span></td>
                        <td><span style="font-weight: 700; color: #C4B5FD;">Rp{{ number_format($barang->harga, 0, ',', '.') }}</span></td>
                        <td>
                            <div class="action">
                                <a href="{{ route('barangs.show', $barang) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('barangs.edit', $barang) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('barangs.destroy', $barang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="pagination">
    {{ $barangs->links() }}
</div>
@endsection