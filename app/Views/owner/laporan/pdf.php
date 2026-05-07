<h3>Laporan Penjualan</h3>

<table border="1" width="100%" cellpadding="5">

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

<h4>Total: Rp <?= number_format($total,0,',','.') ?></h4>