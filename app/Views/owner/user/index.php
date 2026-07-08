<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<form method="get" class="row mb-3">

    <div class="col-md-4">
        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Cari nama, email, atau role..."
            value="<?= esc($keyword ?? '') ?>">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">
            Cari
        </button>
    </div>

</form>

<a href="/owner/user/create" class="btn btn-primary mb-3">
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

<?php
$page = $_GET['page'] ?? 1;
$no = 1 + (100 * ($page - 1));

foreach($users as $u):
?>

<tr>

<td><?= $no++ ?></td>
<td><?= $u['nama'] ?></td>
<td><?= $u['email'] ?></td>
<td><?= $u['role'] ?></td>

<td>

<a href="/owner/user/edit/<?= $u['id_user'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/owner/user/delete/<?= $u['id_user']; ?>"
   onclick="return confirm('Yakin ingin menghapus user <?= $u['nama']; ?>?')"
   class="btn btn-danger btn-sm">
   Hapus
</a>

</td>

</tr>

<?php endforeach ?>

</table>

<?= $this->endSection(); ?>