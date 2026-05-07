<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<form method="post" action="/owner/user/update/<?= $user['id_user'] ?>">

<label>Nama</label>
<input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control">

<br>

<label>Email</label>
<input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">

<br>

<label>Password (kosongkan jika tidak diubah)</label>
<input type="password" name="password" class="form-control">

<br>

<label>Role</label>

<select name="role" class="form-control">

<option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
<option value="kasir" <?= $user['role']=='kasir'?'selected':'' ?>>Kasir</option>
<option value="owner" <?= $user['role']=='owner'?'selected':'' ?>>Owner</option>

</select>

<br>

<button class="btn btn-primary">
Update
</button>

</form>

<?= $this->endSection(); ?>