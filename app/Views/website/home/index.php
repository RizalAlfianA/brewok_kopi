<?= $this->include('website/layout/header'); ?>

<div class="container">

<!-- HERO -->
<div class="row align-items-center mt-5">

<div class="col-lg-6">

<h1 class="fw-bold mb-3 d-flex align-items-center gap-2">
<i data-feather="coffee"></i>
Brewok Kopi
</h1>

<p class="lead text-muted">
Tempat nongkrong terbaik dengan kopi pilihan dan
suasana yang nyaman untuk menikmati waktu bersama
teman maupun keluarga.
</p>

<div class="mt-4 d-flex gap-3">

<a href="/menu" class="btn btn-dark btn-lg d-flex align-items-center gap-2">
<i data-feather="menu"></i>
Lihat Menu
</a>

<a href="/tentang" class="btn btn-outline-dark btn-lg">
Tentang Kami
</a>

</div>

</div>

<div class="col-lg-6">

<img
src="https://images.unsplash.com/photo-1509042239860-f550ce710b93"
class="img-fluid rounded shadow"
>

</div>

</div>

<hr class="my-5">


<!-- TENTANG SINGKAT -->
<div class="row align-items-center">

<div class="col-lg-6">

<img
src="https://images.unsplash.com/photo-1445116572660-236099ec97a0"
class="img-fluid rounded shadow"
>

</div>

<div class="col-lg-6">

<h2 class="fw-bold mb-3">Tentang Brewok Kopi</h2>

<p class="text-muted">
Brewok Kopi adalah tempat nongkrong yang menghadirkan
kopi berkualitas dengan suasana hangat dan nyaman.
Kami menyajikan berbagai pilihan kopi terbaik yang
diseduh langsung oleh barista berpengalaman.
</p>

<a href="/tentang" class="btn btn-outline-dark mt-2">
Baca Selengkapnya
</a>

</div>

</div>

<hr class="my-5">


<!-- STORY -->
<div class="row text-center">

<div class="col-lg-8 mx-auto">

<h2 class="fw-bold mb-3">Cerita Kami</h2>

<p class="text-muted">
Brewok Kopi lahir dari kecintaan terhadap kopi dan
keinginan menciptakan tempat berkumpul yang nyaman.
Kami percaya bahwa secangkir kopi bukan hanya minuman,
tetapi juga pengalaman untuk berbagi cerita dan
menciptakan momen berharga.
</p>

</div>

</div>

<hr class="my-5">


<!-- FOTO CAFE -->
<h2 class="text-center fw-bold mb-4">Suasana Cafe</h2>

<div class="row g-4">

<div class="col-md-4">

<img
src="https://images.unsplash.com/photo-1554118811-1e0d58224f24"
class="img-fluid rounded shadow"
>

</div>

<div class="col-md-4">

<img
src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085"
class="img-fluid rounded shadow"
>

</div>

<div class="col-md-4">

<img
src="https://images.unsplash.com/photo-1511920170033-f8396924c348"
class="img-fluid rounded shadow"
>

</div>

</div>

<hr class="my-5">


<!-- LOKASI -->
<div class="row mb-5">

<div class="col-lg-12 text-center">

<h2 class="fw-bold mb-4">Lokasi Kami</h2>

<p class="text-muted">
Kunjungi Brewok Kopi dan nikmati suasana hangat
serta kopi terbaik kami.
</p>

<div class="ratio ratio-16x9 mt-3">

<iframe
src="https://maps.google.com/maps?q=coffee%20shop&t=&z=13&ie=UTF8&iwloc=&output=embed"
style="border:0;"
allowfullscreen
loading="lazy">
</iframe>

</div>

</div>

</div>

</div>

<script>
feather.replace()
</script>

<?= $this->include('website/layout/footer'); ?>