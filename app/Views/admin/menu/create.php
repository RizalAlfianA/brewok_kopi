<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <h3>Tambah Menu</h3>
</div>

<div class="card">
<div class="card-body">

<?php if(session()->getFlashdata('errors')): ?>

<div class="alert alert-danger">

    <ul class="mb-0">

    <?php foreach(session()->getFlashdata('errors') as $error): ?>

        <li><?= esc($error) ?></li>

    <?php endforeach ?>

    </ul>

</div>

<?php endif; ?>

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

        <input
            type="file"
            name="gambar"
            id="gambar"
            class="form-control"
            accept="image/*">
        
        <img
        id="preview"
        src="#"
        style="display:none;
               max-width:200px;
               border-radius:10px;
               border:1px solid #ddd;
               padding:5px;">

        <small class="text-muted">
            Format: JPG, JPEG, PNG, WEBP, GIF (Maks. 2 MB)
        </small>

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

    // Konfirmasi jika gambar kosong
    if (!gambar) {

        const konfirmasi = confirm(
            'Gambar menu belum ditambahkan, tetap simpan?'
        );

        if (!konfirmasi) {
            e.preventDefault();
            return;
        }
    }

    // Validasi format gambar
    const fileInput = document.getElementById('gambar');

    const preview = document.getElementById('preview');

    fileInput.addEventListener('change', function(){

        const file = this.files[0];

        preview.style.display = "none";

        if(!file) return;

        const allowed = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/webp',
            'image/gif'
        ];

        if(!allowed.includes(file.type)){

            alert("File harus berupa gambar (JPG, JPEG, PNG, WEBP, atau GIF).");

            this.value = "";

            return;
        }

        if(file.size > 2 * 1024 * 1024){

            alert("Ukuran gambar maksimal 2 MB.");

            this.value = "";

            return;
        }

        const reader = new FileReader();

        reader.onload = function(e){

            preview.src = e.target.result;

            preview.style.display = "block";

        }

        reader.readAsDataURL(file);

    // Hapus format titik sebelum dikirim
    hargaInput.value = hargaInput.value.replace(/\./g, '');

});

</script>

<?= $this->endSection(); ?>