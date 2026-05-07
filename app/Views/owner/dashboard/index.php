<?= $this->extend('layout/base'); ?>

<?= $this->section('content'); ?>

<div class="page-content">

    <section class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>Transaksi Hari Ini</h6>
                    <h3><?= $transaksi_hari_ini ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>Omzet Hari Ini</h6>
                    <h3>Rp <?= number_format($omzet_hari_ini, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>Omzet Bulan Ini</h6>
                    <h3>Rp <?= number_format($omzet_bulan_ini, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>Total User</h6>
                    <h3><?= $total_user ?></h3>
                </div>
            </div>
        </div>

    </section>

    <section class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Penjualan 7 Hari</h4>
                </div>
                <div class="card-body">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Top Menu Terlaris</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($top_menu as $menu): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $menu['nama_menu'] ?>
                                <span class="badge bg-success">
                                    <?= $menu['total_terjual'] ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chartPenjualan');

const data = {
    labels: [
        <?php foreach ($grafik as $g): ?>
            "<?= $g['tanggal'] ?>",
        <?php endforeach; ?>
    ],
    datasets: [{
        label: 'Omzet',
        data: [
            <?php foreach ($grafik as $g): ?>
                <?= $g['omzet'] ?>,
            <?php endforeach; ?>
        ]
    }]
};

new Chart(ctx, {
    type: 'line',
    data: data
});
</script>

<?= $this->endSection(); ?>