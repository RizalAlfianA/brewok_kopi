<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>

<div class="page-content">
    <section class="row">

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Total Menu</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Total Kategori</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Transaksi Hari Ini</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Omzet Hari Ini</h5>
                    <h2>Rp 0</h2>
                </div>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection(); ?>