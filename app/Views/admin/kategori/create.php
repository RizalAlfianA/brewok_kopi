<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Kategori</h3>

<form action="/admin/kategori/store" method="post">

<div class="mb-3">
<label>Nama Kategori</label>
<input type="text" name="nama_kategori" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>

</form>

<?= $this->endSection(); ?>