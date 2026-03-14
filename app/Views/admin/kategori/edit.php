<?= $this->extend('admin/layout/base'); ?>
<?= $this->section('content'); ?>

<h3>Edit Kategori</h3>

<form action="/admin/kategori/update/<?= $kategori['id_kategori'] ?>" method="post">

<div class="mb-3">
<label>Nama Kategori</label>
<input type="text" name="nama_kategori"
value="<?= $kategori['nama_kategori'] ?>"
class="form-control">
</div>

<button class="btn btn-success">Update</button>

</form>

<?= $this->endSection(); ?>