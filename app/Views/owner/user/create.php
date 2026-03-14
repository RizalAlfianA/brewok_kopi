<?= $this->extend('owner/layout/base'); ?>
<?= $this->section('content'); ?>

<form method="post" action="/owner/user/store">

<label>Nama</label>
<input type="text" name="nama" class="form-control" required>

<br>

<label>Email</label>
<input type="email" name="email" class="form-control" required>

<br>

<label>Password</label>
<input type="password" name="password" class="form-control" required>

<br>

<label>Role</label>
<select name="role" class="form-control">

<option value="admin">Admin</option>
<option value="kasir">Kasir</option>
<option value="owner">Owner</option>

</select>

<br>

<button class="btn btn-success">
Simpan
</button>

</form>

<?= $this->endSection(); ?>