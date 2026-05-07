<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

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

<?php $no=1; foreach($kategori as $k): ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $k['nama_kategori'] ?></td>

<td>

<a href="/admin/kategori/edit/<?= $k['id_kategori'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/admin/menu/delete/<?= $k['id_kategori']; ?>" 
   onclick="return confirm('Yakin ingin menghapus kategori menu <?= $k['nama_kategori']; ?>?')"
   class="btn btn-danger btn-sm">
   Hapus
</a>

</td>
</tr>

<?php endforeach; ?>

</tbody>
</table>

<?= $this->endSection(); ?>