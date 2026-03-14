<?= $this->extend('admin/layout/base'); ?>
<?= $this->section('content'); ?>

<a href="/admin/user/create" class="btn btn-primary mb-3">
Tambah User
</a>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Role</th>
<th>Aksi</th>
</tr>

<?php $no=1; foreach($users as $u): ?>

<tr>

<td><?= $no++ ?></td>
<td><?= $u['nama'] ?></td>
<td><?= $u['email'] ?></td>
<td><?= $u['role'] ?></td>

<td>

<a href="/admin/user/edit/<?= $u['id_user'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/admin/user/delete/<?= $u['id_user'] ?>" class="btn btn-danger btn-sm">
Hapus
</a>

</td>

</tr>

<?php endforeach ?>

</table>

<?= $this->endSection(); ?>