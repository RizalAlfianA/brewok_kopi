<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<form method="get" class="row mb-3">

    <div class="col-md-3">
        <input
            type="date"
            name="tanggal_awal"
            value="<?= $tanggal_awal ?>"
            class="form-control">
    </div>

    <div class="col-md-3">
        <input
            type="date"
            name="tanggal_akhir"
            value="<?= $tanggal_akhir ?>"
            class="form-control">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">
            Filter
        </button>
    </div>

</form>

<table class="table table-bordered">

    <thead>

    <tr>
        <th width="80">No</th>
        <th>Tanggal</th>
        <th>Total</th>
    </tr>

    </thead>

    <tbody>

    <?php
    $no = 1 + (100 * ((int)($_GET['page'] ?? 1) - 1));
    ?>

    <?php foreach($laporan as $l): ?>

    <tr>

        <td><?= $no++ ?></td>

        <td><?= date('d-m-Y H:i', strtotime($l['tanggal'])) ?></td>

        <td>
            Rp <?= number_format($l['total'],0,',','.') ?>
        </td>

    </tr>

    <?php endforeach ?>

    </tbody>

</table>

<div class="mt-3">

    <?= $pager->links() ?>

</div>

<h4 class="mt-4">

    Total Omzet :
    Rp <?= number_format($total,0,',','.') ?>

</h4>

<?= $this->endSection(); ?>