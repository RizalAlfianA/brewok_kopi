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
        <button class="btn btn-primary">Filter</button>
    </div>

    <div class="col-md-4 text-end">

        <a href="<?= base_url('owner/laporan/exportPdf?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>"
        class="btn btn-danger">
        Export PDF
        </a>

        <a href="<?= base_url('owner/laporan/exportExcel?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>" 
        class="btn btn-success">
        Export Excel
        </a>

    </div>

</form>

<table class="table table-bordered">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total</th>
    </tr>

    <?php
    $page = $_GET['page'] ?? 1;
    $no = 1 + (100 * ($page - 1));

    foreach ($laporan as $l):
    ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $l['tanggal'] ?></td>
        <td>Rp <?= number_format($l['total'], 0, ',', '.') ?></td>
    </tr>

    <?php endforeach; ?>

</table>

<div class="mt-3">
    <?= $pager->links() ?>
</div>

<h4>Total Omzet : Rp <?= number_format($total, 0, ',', '.') ?></h4>

<?= $this->endSection(); ?>