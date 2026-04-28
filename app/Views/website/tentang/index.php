<?= $this->include('website/layout/header'); ?>

<div class="container py-5">

    <!-- CERITA CAFE -->
    <section class="row align-items-center g-4 mb-5">

        <div class="col-lg-6">

            <h2 class="fw-bold mb-3 d-flex align-items-center gap-2">
                <i data-feather="book-open"></i>
                Cerita Brewok Kopi
            </h2>

            <p class="text-muted">
                Brewok Kopi didirikan dari kecintaan terhadap kopi dan
                keinginan menciptakan tempat yang nyaman untuk berkumpul.
                Kami percaya bahwa secangkir kopi bukan hanya minuman,
                tetapi juga pengalaman untuk berbagi cerita, bekerja,
                dan menikmati waktu bersama.
            </p>

            <p class="text-muted">
                Dengan menggunakan biji kopi pilihan dan teknik
                penyeduhan yang tepat, Brewok Kopi berkomitmen
                memberikan pengalaman ngopi terbaik bagi setiap pelanggan.
            </p>

        </div>

        <div class="col-lg-6 text-center">

            <img
                src="/assets/img/Gambar1.jpeg"
                class="img-fluid cafe-img shadow-sm"
                alt="Suasana Brewok Kopi"
            >

        </div>

    </section>


    <!-- VISI MISI -->
    <section class="row g-4 text-center mb-5">

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-3 d-flex justify-content-center align-items-center gap-2">
                        <i data-feather="eye"></i>
                        Visi
                    </h3>

                    <p class="text-muted">
                        Menjadi tempat nongkrong favorit yang menghadirkan
                        kopi berkualitas dan suasana nyaman bagi semua kalangan.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-3 d-flex justify-content-center align-items-center gap-2">
                        <i data-feather="target"></i>
                        Misi
                    </h3>

                    <ul class="text-muted text-start ps-3">

                        <li>Menyajikan kopi berkualitas terbaik.</li>
                        <li>Memberikan pelayanan ramah dan profesional.</li>
                        <li>Menciptakan tempat yang nyaman untuk berkumpul.</li>
                        <li>Menghadirkan pengalaman ngopi yang menyenangkan.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>


    <!-- GALERI -->
    <section class="mb-5">

        <h2 class="text-center fw-bold mb-4">Suasana Cafe</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <img src="/assets/img/Gallery1.jpeg" class="gallery-img shadow-sm" alt="Cafe Brewok">
            </div>

            <div class="col-md-4">
                <img src="/assets/img/Gallery2.jpeg" class="gallery-img shadow-sm" alt="Cafe Brewok">
            </div>

            <div class="col-md-4">
                <img src="/assets/img/Gallery3.jpeg" class="gallery-img shadow-sm" alt="Cafe Brewok">
            </div>

        </div>

    </section>


    <!-- INFORMASI + RESERVASI -->
    <section class="row g-4 mb-5">

        <!-- INFORMASI -->
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4 d-flex align-items-center gap-2">
                        <i data-feather="info"></i>
                        Informasi Brewok Kopi
                    </h4>

                    <p class="mb-3 d-flex align-items-center gap-2">
                        <i data-feather="map-pin"></i>
                        Jl. Contoh No. 123
                    </p>

                    <p class="mb-3 d-flex align-items-center gap-2">
                        <i data-feather="clock"></i>
                        08.00 - 23.00
                    </p>

                    <p class="mb-3 d-flex align-items-center gap-2">
                        <i data-feather="phone"></i>
                        0812-3456-7890
                    </p>

                    <p class="mb-0 d-flex align-items-center gap-2">
                        <i data-feather="instagram"></i>
                        @brewokkopi
                    </p>

                </div>

            </div>

        </div>


        <!-- RESERVASI (HIGHLIGHT) -->
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100 bg-light">

                <div class="card-body d-flex flex-column justify-content-center text-center p-4">

                    <h4 class="fw-bold mb-3 d-flex justify-content-center align-items-center gap-2">
                        <i data-feather="calendar"></i>
                        Reservasi Tempat
                    </h4>

                    <p class="text-muted mb-4">
                        Ingin nongkrong tanpa khawatir kehabisan tempat?
                        Reservasi sekarang dan nikmati waktu santai di Brewok Kopi.
                    </p>

                    <a 
                        href="https://wa.me/6281234567890?text=Halo%20Brewok%20Kopi,%20saya%20ingin%20reservasi%20tempat"
                        target="_blank"
                        class="btn btn-dark btn-lg d-inline-flex justify-content-center align-items-center gap-2"
                    >
                        <i data-feather="message-circle"></i>
                        Reservasi via WhatsApp
                    </a>

                </div>

            </div>

        </div>

    </section>

</div>

<script>
    feather.replace()
</script>

<?= $this->include('website/layout/footer'); ?>