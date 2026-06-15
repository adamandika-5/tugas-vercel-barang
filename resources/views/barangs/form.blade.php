<div class="form-group">
    <label for="nama_barang">Nama Barang</label>
    <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang ?? '') }}" placeholder="Contoh: Laptop, Meja, Kursi">
    @error('nama_barang')
        <small>{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="kategori">Kategori</label>
    <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $barang->kategori ?? '') }}" placeholder="Contoh: Elektronik, Furnitur, Alat Tulis">
    @error('kategori')
        <small>{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="stok">Stok</label>
    <input type="number" id="stok" name="stok" value="{{ old('stok', $barang->stok ?? '') }}" placeholder="0">
    @error('stok')
        <small>{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="harga">Harga (Rupiah)</label>
    <input type="number" id="harga" name="harga" value="{{ old('harga', $barang->harga ?? '') }}" placeholder="150000">
    @error('harga')
        <small>{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan rincian informasi detail barang...">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <small>{{ $message }}</small>
    @enderror
</div>

<div style="margin-top: 32px;">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>