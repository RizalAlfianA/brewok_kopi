<?= $this->extend('kasir/layout/base'); ?>
<?= $this->section('content'); ?>

<style>

.menu-wrapper {
    margin-top: 10px;
}

.menu-card {
    cursor: pointer;
    transition: 0.2s;
    border: none;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
}

.menu-card:hover {
    transform: scale(1.03);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.menu-img {
    height: 140px;
    object-fit: cover;
    padding: 8px;
    border-radius: 15px;
}

.keranjang-box {
    position: sticky;
    top: 20px;
}

.success-icon {
    font-size: 60px;
    color: #28a745;
    animation: pop 0.4s ease;
}

@keyframes pop {

    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}

@media screen and (max-width: 768px) {

    .menu-img {
        height: 100px;
    }

    .menu-card h6 {
        font-size: 0.9rem;
    }

    .keranjang-box {
        position: relative;
        top: 0;
        margin-top: 20px;
    }
}

</style>

<div class="row">

    <!-- MENU -->
    <div class="col-md-8">

        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Menu Brewok Kopi</h5>
            </div>

            <div class="card-body menu-wrapper">

                <!-- SEARCH & FILTER -->

                <div class="row mb-4">

                    <div class="col-md-8 mb-2">
                        <input
                            type="text"
                            id="searchMenu"
                            class="form-control"
                            placeholder="Cari menu..."
                        >
                    </div>

                    <div class="col-md-4 mb-2">
                        <select id="filterKategori" class="form-control">

                            <option value="">
                                Semua Kategori
                            </option>

                            <?php foreach($kategori as $k): ?>

                            <option value="<?= strtolower($k['nama_kategori']) ?>">
                                <?= $k['nama_kategori'] ?>
                            </option>

                            <?php endforeach ?>

                        </select>
                    </div>

                </div>

                <!-- LIST MENU -->

                <div class="row g-3">

                    <?php foreach($menu as $m): ?>

                    <div
                        class="col-lg-3 col-md-4 col-6 menu-item"
                        data-nama="<?= strtolower($m['nama_menu']) ?>"
                        data-kategori="<?= strtolower($m['nama_kategori']) ?>"
                    >

                        <div
                            class="card menu-card text-center"
                            onclick="tambahMenu(
                                '<?= $m['id_menu'] ?>',
                                '<?= $m['nama_menu'] ?>',
                                <?= $m['harga'] ?>
                            )"
                        >

                            <img
                                src="<?= base_url('assets/images/menu/' . $m['gambar']) ?>"
                                class="menu-img"
                            >

                            <div class="card-body p-2">

                                <h6 class="mb-1">
                                    <?= $m['nama_menu'] ?>
                                </h6>

                                <span class="text-primary fw-bold">
                                    Rp <?= number_format($m['harga'],0,',','.') ?>
                                </span>

                            </div>

                        </div>

                    </div>

                    <?php endforeach ?>

                </div>

            </div>

        </div>

    </div>

    <!-- KERANJANG -->
    <div class="col-md-4">

        <div class="card keranjang-box shadow">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Keranjang</h5>
            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="keranjang"></tbody>

                </table>

                <hr>

                <h5>
                    Total :
                    Rp <span id="total">0</span>
                </h5>

                <input
                    type="text"
                    id="bayar"
                    class="form-control mt-3"
                    placeholder="Uang Bayar"
                    onkeyup="formatRupiah(this); hitungKembalian()"
                >

                <h6 class="mt-3">
                    Kembalian :
                    Rp <span id="kembalian">0</span>
                </h6>

                <button
                    class="btn btn-success w-100 mt-3"
                    onclick="simpanTransaksi()"
                >
                    Simpan Transaksi
                </button>

            </div>

        </div>

    </div>

</div>

<!-- STRUK -->

<div
    id="struk"
    style="display:none; font-family: monospace; width:300px;"
>

    <h4 style="text-align:center;">
        Brewok Kopi
    </h4>

    <hr>

    <div id="struk-items"></div>

    <hr>

    <p>
        Total :
        Rp <span id="struk-total"></span>
    </p>

    <p>
        Bayar :
        Rp <span id="struk-bayar"></span>
    </p>

    <p>
        Kembali :
        Rp <span id="struk-kembali"></span>
    </p>

    <hr>

    <p style="text-align:center;">
        Terima Kasih ☕
    </p>

</div>

<!-- MODAL -->

<div class="modal fade" id="modalSukses">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-body text-center">

                <div class="success-icon">✔</div>

                <h4 class="mt-3">
                    Transaksi Berhasil
                </h4>

                <p class="mt-3">
                    Total:
                    Rp <span id="modal-total"></span>
                </p>

                <p>
                    Bayar:
                    Rp <span id="modal-bayar"></span>
                </p>

                <p>
                    Kembali:
                    Rp <span id="modal-kembali"></span>
                </p>

            </div>

            <div class="modal-footer justify-content-center">

                <button
                    class="btn btn-primary"
                    onclick="cetakStrukTerakhir()"
                >
                    Cetak Struk 🧾
                </button>

            </div>

        </div>

    </div>

</div>

<!-- SOUND -->

<audio id="successSound">
    <source src="https://www.soundjay.com/buttons/sounds/button-3.mp3">
</audio>

<script>

let keranjang = [];
let total = 0;
let lastTransaksi = null;

// ================= SEARCH MENU =================

const searchMenu = document.getElementById('searchMenu');
const filterKategori = document.getElementById('filterKategori');

searchMenu.addEventListener('keyup', filterMenu);
filterKategori.addEventListener('change', filterMenu);

function filterMenu() {

    const keyword = searchMenu.value.toLowerCase();
    const kategori = filterKategori.value.toLowerCase();

    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {

        const nama = item.dataset.nama;
        const kategoriMenu = item.dataset.kategori;

        const cocokNama = nama.includes(keyword);

        const cocokKategori =
            kategori === '' ||
            kategoriMenu === kategori;

        item.style.display =
            cocokNama && cocokKategori
            ? 'block'
            : 'none';
    });
}

// ================= TAMBAH MENU =================

function tambahMenu(id, nama, harga)
{
    let item = keranjang.find(i => i.id == id);

    if (item) {

        item.qty++;
        item.subtotal = item.qty * harga;

    } else {

        keranjang.push({
            id,
            nama,
            harga,
            qty: 1,
            subtotal: harga
        });
    }

    renderKeranjang();
}

// ================= RENDER KERANJANG =================

function renderKeranjang()
{
    let tbody = document.getElementById("keranjang");

    tbody.innerHTML = "";

    total = 0;

    keranjang.forEach((item, i) => {

        total += item.subtotal;

        tbody.innerHTML += `
        <tr>
            <td>${item.nama}</td>

            <td>
                <button onclick="kurangQty(${i})">-</button>

                ${item.qty}

                <button onclick="tambahQty(${i})">+</button>
            </td>

            <td>
                Rp ${item.subtotal.toLocaleString('id-ID')}
            </td>

            <td>
                <button onclick="hapusItem(${i})">
                    x
                </button>
            </td>
        </tr>`;
    });

    document.getElementById("total").innerText =
        total.toLocaleString('id-ID');
}

// ================= QTY =================

function tambahQty(i)
{
    keranjang[i].qty++;

    keranjang[i].subtotal =
        keranjang[i].qty * keranjang[i].harga;

    renderKeranjang();
}

function kurangQty(i)
{
    if (keranjang[i].qty > 1) {

        keranjang[i].qty--;

        keranjang[i].subtotal =
            keranjang[i].qty * keranjang[i].harga;
    }

    renderKeranjang();
}

function hapusItem(i)
{
    keranjang.splice(i, 1);

    renderKeranjang();
}

// ================= FORMAT RUPIAH =================

function formatRupiah(input)
{
    let angka = input.value.replace(/[^,\d]/g, '');

    let sisa = angka.length % 3;

    let rupiah = angka.substr(0, sisa);

    let ribuan = angka
        .substr(sisa)
        .match(/\d{3}/gi);

    if (ribuan) {

        rupiah +=
            (sisa ? '.' : '') +
            ribuan.join('.');
    }

    input.value = rupiah;
}

// ================= HITUNG KEMBALIAN =================

function hitungKembalian()
{
    let bayar =
        parseInt(
            document.getElementById("bayar")
            .value
            .replace(/\./g, '')
        ) || 0;

    let kembali = bayar - total;

    document.getElementById("kembalian").innerText =
        kembali > 0
        ? kembali.toLocaleString('id-ID')
        : 0;
}

// ================= SIMPAN TRANSAKSI =================

function simpanTransaksi()
{
    let bayar =
        parseInt(
            document.getElementById("bayar")
            .value
            .replace(/\./g, '')
        ) || 0;

    if (keranjang.length === 0)
        return alert("Pilih menu!");

    if (total <= 0)
        return alert("Total tidak valid!");

    if (bayar < total)
        return alert("Uang kurang!");

    let kembalian = bayar - total;

    fetch("/kasir/simpan-transaksi", {

        method: "POST",

        headers: {
            "Content-Type":"application/json"
        },

        body: JSON.stringify({
            total,
            bayar,
            kembalian,
            items: keranjang
        })

    })

    .then(res => res.json())

    .then(res => {

        lastTransaksi = {
            items:[...keranjang],
            total,
            bayar,
            kembalian
        };

        document.getElementById("modal-total").innerText =
            total.toLocaleString('id-ID');

        document.getElementById("modal-bayar").innerText =
            bayar.toLocaleString('id-ID');

        document.getElementById("modal-kembali").innerText =
            kembalian.toLocaleString('id-ID');

        document.getElementById("successSound").play();

        let modal = new bootstrap.Modal(
            document.getElementById('modalSukses')
        );

        modal.show();

        keranjang = [];
        total = 0;

        renderKeranjang();

        document.getElementById("bayar").value = "";

        document.getElementById("kembalian").innerText = "0";
    });
}

// ================= CETAK STRUK =================

function cetakStrukTerakhir()
{
    if (!lastTransaksi)
        return alert("Belum ada transaksi!");

    cetakStruk(lastTransaksi);
}

function cetakStruk(data)
{
    let itemsHTML = "";

    data.items.forEach(item => {

        itemsHTML += `
        <p>
            ${item.nama} x${item.qty}<br>
            Rp ${item.subtotal.toLocaleString('id-ID')}
        </p>`;
    });

    document.getElementById("struk-items").innerHTML = itemsHTML;

    document.getElementById("struk-total").innerText =
        data.total.toLocaleString('id-ID');

    document.getElementById("struk-bayar").innerText =
        data.bayar.toLocaleString('id-ID');

    document.getElementById("struk-kembali").innerText =
        data.kembalian.toLocaleString('id-ID');

    let win = window.open('', '', 'width=400,height=600');

    win.document.write(`
        <body onload="window.print(); window.close();">
            ${document.getElementById("struk").innerHTML}
        </body>
    `);

    win.document.close();
}

// ================= AUTO FOCUS =================

document.getElementById('modalSukses')
.addEventListener('hidden.bs.modal', () => {

    document.getElementById("bayar").focus();
});

</script>

<?= $this->endSection(); ?>