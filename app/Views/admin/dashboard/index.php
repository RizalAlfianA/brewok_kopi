<?= $this->extend('layout/base'); ?>

<?= $this->section('content'); ?>

<div class="page-content">
    <section class="row">

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Total Menu</h5>
                    <h2><?= $totalMenu; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Total Kategori</h5>
                    <h2><?= $totalKategori; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Transaksi Hari Ini</h5>
                    <h2><?= $transaksiHariIni; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Omzet Hari Ini</h5>
                    <h2>Rp <?= number_format($omzetHariIni, 0, ',', '.'); ?></h2>
                </div>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection(); ?>