<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<form method="get" class="row mb-3">

    <div class="col-md-4">
        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Cari kategori..."
            value="<?= esc($keyword ?? '') ?>">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">
            Cari
        </button>
    </div>

</form>

<a href="/admin/kategori/create" class="btn btn-primary mb-3">
Tambah Kategori
</a>

<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Nama Kategori</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php
$page = $_GET['page'] ?? 1;
$no = 1 + (100 * ($page - 1));

foreach($kategori as $k):
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $k['nama_kategori'] ?></td>

<td>

<a href="/admin/kategori/edit/<?= $k['id_kategori'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/admin/kategori/delete/<?= $k['id_kategori']; ?>" 
   onclick="return confirm('Yakin ingin menghapus kategori menu <?= $k['nama_kategori']; ?>?')"
   class="btn btn-danger btn-sm">
   Hapus
</a>

</td>
</tr>

<?php endforeach; ?>

</tbody>
</table>

<div class="mt-3">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>