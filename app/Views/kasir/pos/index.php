<?= $this->extend('kasir/layout/base'); ?>
<?= $this->section('content'); ?>

<style>

.menu-card{
cursor:pointer;
transition:0.2s;
}

.menu-card:hover{
transform:scale(1.05);
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

.keranjang-box{
position:sticky;
top:20px;
}

</style>

<div class="row">

<!-- ================= MENU PRODUK ================= -->

<div class="col-md-8">

<div class="card shadow-sm">

<div class="card-header bg-dark text-white">
<h5 class="mb-0">Menu Brewok Kopi</h5>
</div>

<div class="card-body">

<div class="row">

<?php foreach($menu as $m): ?>

<div class="col-md-3 mb-3">

<div class="card menu-card text-center"
onclick="tambahMenu(
'<?= $m['id_menu'] ?>',
'<?= $m['nama_menu'] ?>',
<?= $m['harga'] ?>
)">

<img src="<?= base_url('assets/images/menu/'.$m['gambar']) ?>"
class="card-img-top"
style="height:120px;object-fit:cover">

<div class="card-body p-2">

<h6 class="mb-1"><?= $m['nama_menu'] ?></h6>

<span class="text-primary fw-bold">
Rp <?= number_format($m['harga']) ?>
</span>

</div>

</div>

</div>

<?php endforeach ?>

</div>

</div>
</div>

</div>


<!-- ================= KERANJANG ================= -->

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

<div class="mt-3">

<input type="number"
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
class="btn btn-success w-100 mt-3"
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

let tbody = document.getElementById("keranjang")
tbody.innerHTML=""

total=0

keranjang.forEach((item,index)=>{

total += item.subtotal

tbody.innerHTML += `
<tr>

<td>${item.nama}</td>

<td>
<button class="btn btn-sm btn-secondary"
onclick="kurangQty(${index})">-</button>

${item.qty}

<button class="btn btn-sm btn-secondary"
onclick="tambahQty(${index})">+</button>
</td>

<td>
Rp ${item.subtotal.toLocaleString()}
</td>

<td>
<button class="btn btn-sm btn-danger"
onclick="hapusItem(${index})">
x
</button>
</td>

</tr>
`

})

document.getElementById("total").innerText =
total.toLocaleString()

}


function tambahQty(index){

keranjang[index].qty++
keranjang[index].subtotal =
keranjang[index].qty * keranjang[index].harga

renderKeranjang()

}

function kurangQty(index){

if(keranjang[index].qty>1){

keranjang[index].qty--

keranjang[index].subtotal =
keranjang[index].qty * keranjang[index].harga

}

renderKeranjang()

}

function hapusItem(index){

keranjang.splice(index,1)

renderKeranjang()

}

function hitungKembalian(){

let bayar =
document.getElementById("bayar").value

let kembali = bayar - total

document.getElementById("kembalian").innerText =
kembali.toLocaleString()

}

function simpanTransaksi(){

let bayar =
document.getElementById("bayar").value

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