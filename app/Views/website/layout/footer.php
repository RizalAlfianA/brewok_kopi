</div>

<footer class="bg-dark text-white mt-5 pt-5 pb-3">
    <div class="container">

        <div class="row gy-4">

            <!-- ================= TENTANG ================= -->
            <div class="col-lg-4">

                <h5 class="fw-bold d-flex align-items-center gap-2 mb-3">
                    <i data-feather="coffee"></i>
                    Brewok Kopi
                </h5>

                <p class="text-light mb-0">
                    Brewok Kopi adalah tempat nongkrong yang menghadirkan
                    kopi berkualitas dengan suasana nyaman untuk menikmati
                    waktu bersama teman maupun keluarga.
                </p>

            </div>


            <!-- ================= MENU CEPAT ================= -->
            <div class="col-lg-4">

                <h5 class="fw-bold mb-3">Menu</h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="/" class="footer-link">
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/menu" class="footer-link">
                            Menu
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/tentang" class="footer-link">
                            Tentang
                        </a>
                    </li>

                </ul>

            </div>


            <!-- ================= KONTAK ================= -->
            <div class="col-lg-4">

                <h5 class="fw-bold mb-3">Kontak</h5>

                <p class="mb-2 d-flex align-items-center gap-2">
                    <i data-feather="map-pin"></i>
                    Jl. U. Sutaatmadja, Sukagalih 1
                </p>

                <p class="mb-2 d-flex align-items-center gap-2">
                    <i data-feather="phone"></i>
                    0812-3456-7890
                </p>

                <!-- INSTAGRAM LINK -->
                <p class="mb-2 d-flex align-items-center gap-2">
                    <i data-feather="instagram"></i>
                    <a href="https://www.instagram.com/brewok_kopi/" 
                       target="_blank" 
                       class="footer-link">
                        @brewok_kopi
                    </a>
                </p>

            </div>

        </div>


        <hr class="border-secondary my-4">


        <!-- ================= COPYRIGHT ================= -->
        <div class="text-center">

            <p class="mb-0 d-flex justify-content-center align-items-center gap-2 small">
                <i data-feather="coffee"></i>
                © <?= date('Y') ?> Brewok Kopi. All rights reserved.
            </p>

        </div>

    </div>
</footer>


<!-- ================= STYLE ================= -->
<style>

.footer-link{
    color:#ddd;
    text-decoration:none;
    transition:0.2s;
}

.footer-link:hover{
    color:#ffc107;
}

</style>


<script>
    feather.replace()
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>