<?= $this->include('website/layout/header'); ?>

<div class="container mt-5">

    <div class="row">

        <!-- ================= SIDEBAR KATEGORI ================= -->
        <div class="col-lg-3">

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Kategori</h5>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <a href="<?= base_url('menu') ?>" class="text-decoration-none">
                                Semua Menu
                            </a>
                        </li>

                        <?php foreach($kategori as $k): ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('menu?kategori='.$k['id_kategori']) ?>" 
                               class="text-decoration-none text-dark">
                                <?= $k['nama_kategori'] ?>
                            </a>
                        </li>
                        <?php endforeach ?>

                    </ul>

                </div>
            </div>

        </div>


        <!-- ================= GRID MENU ================= -->
        <div class="col-lg-9">

            <h2 class="fw-bold mb-4">Menu Brewok Kopi</h2>

            <div class="row g-4">

                <?php foreach($menu as $m): ?>

                <div class="col-md-4">

                    <div class="card h-100 shadow-sm border-0 menu-item"
                         onclick="showDetail(
                            '<?= $m['nama_menu'] ?>',
                            '<?= number_format($m['harga'],0,',','.') ?>',
                            '<?= $m['deskripsi'] ?>',
                            '<?= base_url('assets/images/menu/'.$m['gambar']) ?>'
                         )">

                        <img
                            src="<?= base_url('assets/images/menu/'.$m['gambar']) ?>"
                            class="card-img-top menu-img"
                        >

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                <?= $m['nama_menu'] ?>
                            </h5>

                            <p class="text-muted mb-0">
                                Rp <?= number_format($m['harga'],0,',','.') ?>
                            </p>

                        </div>

                    </div>

                </div>

                <?php endforeach ?>

            </div>

        </div>

    </div>

</div>


<!-- ================= MODAL DETAIL MENU ================= -->
<div class="modal fade" id="modalMenu" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Detail Menu</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <!-- GAMBAR -->
                    <div class="col-md-5 text-center">
                        <img id="modal-gambar" class="img-fluid modal-img">
                    </div>

                    <!-- DETAIL -->
                    <div class="col-md-7">

                        <h4 id="modal-nama" class="fw-bold"></h4>

                        <h5 id="modal-harga" class="text-primary mb-3"></h5>

                        <p id="modal-deskripsi" class="text-muted"></p>

                        <a id="btn-wa" class="btn btn-success mt-3" target="_blank">
                            Pesan via WhatsApp
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<!-- ================= STYLE ================= -->
<style>

.menu-item{
    cursor:pointer;
    transition:0.25s;
}

.menu-item:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

.menu-img{
    height:200px;
    object-fit:cover;
}

.modal-img{
    width: 100%;
    max-height: 250px;
    object-fit: cover;
    border-radius: 10px;
}

</style>


<!-- ================= SCRIPT ================= -->
<script>

function showDetail(nama, harga, deskripsi, gambar){

    document.getElementById("modal-nama").innerText = nama
    document.getElementById("modal-harga").innerText = "Rp " + harga
    document.getElementById("modal-deskripsi").innerText = deskripsi
    document.getElementById("modal-gambar").src = gambar

let nomor = "6287742993832"

    let pesan = `Halo Brewok Kopi, saya ingin pesan ${nama}`

    let url = "https://wa.me/" + nomor + "?text=" + encodeURIComponent(pesan)

    document.getElementById("btn-wa").href = url

    let modal = new bootstrap.Modal(document.getElementById('modalMenu'))
    modal.show()
}

</script>


<?= $this->include('website/layout/footer'); ?>