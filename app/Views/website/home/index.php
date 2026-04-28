<?= $this->include('website/layout/header'); ?>

<div class="container py-5">

    <!-- HERO -->
    <section class="row align-items-center g-4 mb-5">

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

            <div class="mt-4 d-flex flex-wrap gap-3">

                <a href="/menu" class="btn btn-dark btn-lg d-flex align-items-center gap-2">
                    <i data-feather="menu"></i>
                    Lihat Menu
                </a>

                <a href="/tentang" class="btn btn-outline-dark btn-lg d-flex align-items-center gap-2">
                    <i data-feather="info"></i>
                    Tentang Kami
                </a>

            </div>

        </div>

        <div class="col-lg-6 text-center">

            <img
                src="<?= base_url('assets/img/Gambar1.jpeg'); ?>" 
                class="img-fluid hero-img shadow-sm"
                alt="Kopi Brewok Kopi"
            >

        </div>

    </section>

    <hr class="my-5">


    <!-- TENTANG SINGKAT -->
    <section class="row align-items-center g-4 mb-5">

        <div class="col-lg-6 text-center">

            <img
                src="<?= base_url('assets/img/Gambar2.jpeg'); ?>" 
                class="img-fluid cafe-img shadow-sm"
                alt="Suasana Brewok Kopi"
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

            <a href="/tentang" class="btn btn-outline-dark mt-2 d-inline-flex align-items-center gap-2">
                <i data-feather="arrow-right"></i>
                Baca Selengkapnya
            </a>

        </div>

    </section>

    <hr class="my-5">


    <!-- STORY -->
    <section class="row text-center mb-5">

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

    </section>

    <hr class="my-5">


    <!-- GALERI / FOTO CAFE -->
    <section class="mb-5">

        <h2 class="text-center fw-bold mb-4">Suasana Cafe</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <img
                    src="<?= base_url('assets/img/Gallery1.jpeg'); ?>"
                    class="img-fluid gallery-img shadow-sm"
                    alt="Interior Cafe"
                >
            </div>

            <div class="col-md-4">
                <img
                    src="<?= base_url('assets/img/Gallery2.jpeg'); ?>"
                    class="img-fluid gallery-img shadow-sm"
                    alt="Barista Coffee"
                >
            </div>

            <div class="col-md-4">
                <img
                    src="<?= base_url('assets/img/Gallery3.jpeg'); ?>"
                    class="img-fluid gallery-img shadow-sm"
                    alt="Coffee Table"
                >
            </div>

        </div>

    </section>

    <hr class="my-5">


    <!-- LOKASI -->
    <section class="text-center mb-5">

        <h2 class="fw-bold mb-3">Lokasi Kami</h2>

        <p class="text-muted">
            Kunjungi Brewok Kopi dan nikmati suasana hangat
            serta kopi terbaik kami.
        </p>

        <div class="ratio ratio-16x9 mt-4">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6969832398668!2d107.7637771!3d-6.5598816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693d004dbfde7b%3A0x5958e46cbb297b17!2sBrewok%20Kopi!5e0!3m2!1sid!2sid!4v1773760567125!5m2!1sid!2sid"
                style="border:0;"
                allowfullscreen
                loading="lazy">
            </iframe>

        </div>

    </section>

</div>

<script>
    feather.replace()
</script>

<?= $this->include('website/layout/footer'); ?>