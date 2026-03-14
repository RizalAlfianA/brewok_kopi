<?= $this->extend('admin/layout/base'); ?>
<?= $this->section('content'); ?>

<a href="/admin/menu/create" class="btn btn-primary mb-3">
Tambah Menu
</a>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Gambar</th>
<th>Nama Menu</th>
<th>Harga</th>
<th>Kategori</th>
<th>Aksi</th>
</tr>

<?php $no=1; foreach($menu as $m): ?>

<tr>

<td><?= $no++ ?></td>

<td>
<img src="<?= base_url('assets/images/menu/'.$m['gambar']) ?>"
width="60">
</td>

<td><?= $m['nama_menu'] ?></td>

<td>Rp <?= number_format($m['harga']) ?></td>

<td><?= $m['nama_kategori'] ?></td>

<td>

<a href="/admin/menu/edit/<?= $m['id_menu'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/admin/menu/delete/<?= $m['id_menu'] ?>" class="btn btn-danger btn-sm">
Hapus
</a>

</td>

</tr>

<?php endforeach ?>

</table>

<?= $this->endSection(); ?>