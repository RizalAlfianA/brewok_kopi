<?= $this->extend('admin/layout/base'); ?>
<?= $this->section('content'); ?>

<div class="row">

<!-- MENU LIST -->

<div class="col-md-8">

<div class="row">

<?php foreach($menu as $m): ?>

<div class="col-md-3 mb-3">

<div class="card">

<img src="<?= base_url('assets/images/menu/'.$m['gambar']) ?>" class="card-img-top">

<div class="card-body text-center">

<h6><?= $m['nama_menu'] ?></h6>

<p>Rp <?= number_format($m['harga']) ?></p>

<button
class="btn btn-primary btn-sm"
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


<!-- KERANJANG -->

<div class="col-md-4">

<h5>Keranjang</h5>

<table class="table" id="keranjang">

<thead>
<tr>
<th>Menu</th>
<th>Qty</th>
<th>Subtotal</th>
</tr>
</thead>

<tbody></tbody>

</table>

<h4>Total : Rp <span id="total">0</span></h4>

<div class="mt-3">

<input
type="number"
id="bayar"
class="form-control"
placeholder="Uang Bayar"
onkeyup="hitungKembalian()">

</div>

<h5 class="mt-3">

Kembalian :
Rp <span id="kembalian">0</span>

</h5>

<button
class="btn btn-success mt-3 w-100"
onclick="simpanTransaksi()">

Simpan Transaksi

</button>

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
<td>${item.subtotal}</td>
</tr>
`

})

document.getElementById("total").innerText = total

}

function hitungKembalian(){

let bayar = document.getElementById("bayar").value

let kembali = bayar - total

document.getElementById("kembalian").innerText = kembali

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