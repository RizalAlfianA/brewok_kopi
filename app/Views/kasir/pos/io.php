<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>

<div class="page-content">
<div class="row">

<!-- MENU PRODUK -->

<div class="col-md-8">

<div class="card">
<div class="card-header">

<h5 class="mb-0">Menu Produk</h5>

</div>

<div class="card-body">

<div class="row">

<?php foreach($menu as $m): ?>

<div class="col-md-3 mb-3">

<div class="card h-100 text-center shadow-sm">

<img
src="<?= base_url('assets/images/menu/'.$m['gambar']) ?>"
class="card-img-top"
style="height:120px; object-fit:cover;">

<div class="card-body">

<h6><?= $m['nama_menu'] ?></h6>

<p class="text-primary fw-bold">
Rp <?= number_format($m['harga']) ?>
</p>

<button
class="btn btn-primary btn-sm w-100"
onclick="tambahMenu(
'<?= $m['id_menu'] ?>',
'<?= $m['nama_menu'] ?>',
<?= $m['harga'] ?>
)">

Tambah

</button>

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

<div class="card">

<div class="card-header">

<h5 class="mb-0">Keranjang Pesanan</h5>

</div>

<div class="card-body">

<table class="table table-sm" id="keranjang">

<thead>
<tr>
<th>Menu</th>
<th>Qty</th>
<th>Subtotal</th>
</tr>
</thead>

<tbody></tbody>

</table>

<hr>

<h5>
Total :
Rp <span id="total">0</span>
</h5>

<div class="mt-3">

<input
type="number"
id="bayar"
class="form-control"
placeholder="Uang Bayar"
onkeyup="hitungKembalian()">

</div>

<h6 class="mt-3">

Kembalian :
Rp <span id="kembalian">0</span>

</h6>

<button
class="btn btn-success mt-3 w-100"
onclick="simpanTransaksi()">

Simpan Transaksi

</button>

</div>

</div>

</div>

</div>


<script>

let keranjang = []
let total = 0

function tambahMenu(id,nama,harga){

let item = keranjang.find(i=>i.id==id)

if(item){

item.qty++
item.subtotal = item.qty * harga

}else{

keranjang.push({
id:id,
nama:nama,
harga:harga,
qty:1,
subtotal:harga
})

}

renderKeranjang()

}

function renderKeranjang(){

let tbody = document.querySelector("#keranjang tbody")

tbody.innerHTML = ""

total = 0

keranjang.forEach(item=>{

total += item.subtotal

tbody.innerHTML += `
<tr>
<td>${item.nama}</td>
<td>${item.qty}</td>
<td>Rp ${item.subtotal.toLocaleString()}</td>
</tr>
`

})

document.getElementById("total").innerText =
total.toLocaleString()

}

function hitungKembalian(){

let bayar = document.getElementById("bayar").value

let kembali = bayar - total

document.getElementById("kembalian").innerText =
kembali.toLocaleString()

}

function simpanTransaksi(){

let bayar = document.getElementById("bayar").value

let kembalian = bayar - total

fetch("/kasir/simpan-transaksi",{

method:"POST",

headers:{
"Content-Type":"application/json"
},

body:JSON.stringify({

total:total,
bayar:bayar,
kembalian:kembalian,
items:keranjang

})

})

.then(res=>res.json())

.then(res=>{

alert("Transaksi berhasil")

keranjang=[]

renderKeranjang()

document.getElementById("bayar").value=""
document.getElementById("kembalian").innerText="0"

})

}

</script>

<?= $this->endSection(); ?>