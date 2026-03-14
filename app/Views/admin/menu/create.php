<?= $this->extend('admin/layout/base'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <h3>Tambah Menu</h3>
</div>

<div class="card">
<div class="card-body">

<form action="/admin/menu/store" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text" name="nama_menu" class="form-control" required>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="mb-3">
<label>Kategori</label>
<select name="id_kategori" class="form-control" required>

<option value="">-- Pilih Kategori --</option>

<?php foreach($kategori as $k): ?>

<option value="<?= $k['id_kategori'] ?>">
<?= $k['nama_kategori'] ?>
</option>

<?php endforeach ?>

</select>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Gambar Menu</label>
<input type="file" name="gambar" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>
<a href="/admin/menu" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

<?= $this->endSection(); ?>