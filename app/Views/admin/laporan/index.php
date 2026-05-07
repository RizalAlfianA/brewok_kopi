<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<form method="get" class="row mb-3">

<div class="col-md-3">
<input type="date" name="tanggal_awal" class="form-control">
</div>

<div class="col-md-3">
<input type="date" name="tanggal_akhir" class="form-control">
</div>

<div class="col-md-2">
<button class="btn btn-primary">Filter</button>
</div>

</form>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Tanggal</th>
<th>Total</th>
</tr>

<?php $no=1; foreach($laporan as $l): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $l['tanggal'] ?></td>

<td>Rp <?= number_format($l['total'],0,',','.') ?></td>

</tr>

<?php endforeach ?>

</table>

<h4>Total Omzet : Rp <?= number_format($total,0,',','.') ?></h4>

<?= $this->endSection(); ?>