<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Brewok Kopi</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

<style>

body{
background:#f8f9fa;
font-family: system-ui, -apple-system, sans-serif;
}

/* NAVBAR */

.navbar{
padding:14px 0;
}

.navbar-brand{
font-weight:700;
font-size:20px;
display:flex;
align-items:center;
gap:8px;
letter-spacing:0.5px;
}

.nav-link{
font-weight:500;
display:flex;
align-items:center;
gap:6px;
margin-left:10px;
transition:0.2s;
}

.nav-link:hover{
color:#ffc107 !important;
}

.btn-menu{
padding:6px 14px;
border-radius:20px;
font-weight:500;
}

/* SIZE IMG */

.hero-img {
    width: 100%;
    max-height: 600px;
    object-fit: cover;
    border-radius: 10px;
}

.cafe-img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 8px;
}

.gallery-img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">

<div class="container">

<a class="navbar-brand" href="/">
<i data-feather="coffee"></i>
Brewok Kopi
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto align-items-lg-center">

<li class="nav-item">
<a class="nav-link" href="/">
<i data-feather="home"></i>
Home
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/menu">
<i data-feather="book-open"></i>
Menu
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/tentang">
<i data-feather="info"></i>
Tentang
</a>
</li>

<li class="nav-item ms-lg-3">
<a class="btn btn-warning btn-menu d-flex align-items-center gap-1" href="/menu">
<i data-feather="coffee"></i>
Pesan Kopi
</a>
</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-4">