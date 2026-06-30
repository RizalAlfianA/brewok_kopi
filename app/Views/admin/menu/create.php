<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <h3>Tambah Menu</h3>
</div>

<div class="card">
<div class="card-body">

<form action="/admin/menu/store" 
      method="post" 
      enctype="multipart/form-data"
      id="formMenu">

    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" 
               name="nama_menu" 
               class="form-control" 
               required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="text" 
               name="harga" 
               id="harga"
               class="form-control" 
               placeholder="Contoh: 15.000"
               required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>

        <select name="id_kategori" 
                class="form-control" 
                required>

            <option value="">
                -- Pilih Kategori --
            </option>

            <?php foreach($kategori as $k): ?>

            <option value="<?= $k['id_kategori'] ?>">
                <?= $k['nama_kategori'] ?>
            </option>

            <?php endforeach ?>

        </select>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>

        <textarea name="deskripsi" 
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Gambar Menu</label>

        <input type="file" 
               name="gambar" 
               id="gambar"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>

    <a href="/admin/menu" class="btn btn-secondary">
        Kembali
    </a>

</form>

</div>
</div>

<script>

// ================= FORMAT HARGA =================

const hargaInput = document.getElementById('harga');

hargaInput.addEventListener('input', function(e) {

    let value = this.value.replace(/[^0-9]/g, '');

    this.value = new Intl.NumberFormat('id-ID').format(value);
});

// ================= VALIDASI GAMBAR =================

document.getElementById('formMenu').addEventListener('submit', function(e) {

    const gambar = document.getElementById('gambar').value;

    if (!gambar) {

        const konfirmasi = confirm(
            'Gambar menu belum ditambahkan, tetap simpan?'
        );

        if (!konfirmasi) {
            e.preventDefault();
        }
    }

    // hapus titik sebelum submit
    hargaInput.value = hargaInput.value.replace(/\./g, '');
});

</script>

<?= $this->endSection(); ?>