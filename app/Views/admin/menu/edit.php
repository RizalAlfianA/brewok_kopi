<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <h3>Edit Menu</h3>
</div>

<div class="card">
<div class="card-body">

<form action="/admin/menu/update/<?= $menu['id_menu'] ?>" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text"
name="nama_menu"
class="form-control"
value="<?= $menu['nama_menu'] ?>"
required>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number"
name="harga"
class="form-control"
value="<?= $menu['harga'] ?>"
required>
</div>

<div class="mb-3">
<label>Kategori</label>

<select name="id_kategori" class="form-control">

<?php foreach($kategori as $k): ?>

<option value="<?= $k['id_kategori'] ?>"
<?= ($menu['id_kategori']==$k['id_kategori'])?'selected':'' ?>>

<?= $k['nama_kategori'] ?>

</option>

<?php endforeach ?>

</select>

</div>

<div class="mb-3">
<label>Deskripsi</label>

<textarea name="deskripsi"
class="form-control"><?= $menu['deskripsi'] ?></textarea>

</div>

<div class="mb-3">

<label>Gambar Sekarang</label>
<br>

<img src="<?= base_url('assets/images/menu/'.$menu['gambar']) ?>" width="120">

</div>

<div class="mb-3">

<label>Ganti Gambar</label>
<input type="file" name="gambar" class="form-control">

</div>

<button class="btn btn-success">Update</button>
<a href="/admin/menu" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

<?= $this->endSection(); ?>