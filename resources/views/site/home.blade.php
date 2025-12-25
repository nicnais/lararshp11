<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Rumah Sakit Hewan Pendidikan Unair">
  <meta name="keywords" content="HTML, CSS">
  <meta name="author" content="Arhaburrizqi">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - RSHP Unair</title>
  <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>
<body>

<!-- Nav atas -->
<nav class="nav-atas">
  <a href="home.php">Home</a>
  <a href="#">Tentang Kami</a>
  <a href="#">Dokter Jaga</a>
  <a href="#">Layanan Umum</a>
  <a href="#">Instalasi Pendukung</a>
  <a href="#">Pendidikan</a>
  <a href="#">Penelitian</a>
  <a href="#">Pelatihan</a>
  <a href="{{ route('login') }}">Login</a>
</nav>

<!-- Banner -->
<div class="banner">
    <img src="./aset/banner.webp" alt="Rumah Sakit Hewan Pendidikan Unair">
</div>

<!-- Nav bawah -->
<nav class="nav-bawah">
  <a href="struktur_org.html">Struktur Organisasi</a>
  <a href="#">Layanan Umum</a>
  <a href="#">Visi Misi dan Tujuan</a>
</nav>

<!-- Dua kolom -->
<section class="dua-kolom">
  <div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/rCfvZPECZvE?si=6UU1MSyB2qtCoiME" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="teks" style="font-size: 21px;">
    <p>Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas pelayanan, maka dari itu Rumah Sakit Hewan Pendidikan Universitas Airlangga mempunyai fitur pendaftaran online yang mempermudah untuk mendaftarkan hewan kesayangan anda.</p>
  </div>
</section>

<!-- Berita Terkini -->
<section class="berita">
  <h2>Berita Terkini</h2>
  <div class="berita-wrapper">
    <div class="berita-item">
      <img src="./aset/berita1.jpg" alt="Program Kerja Sama">
      <div class="berita-item-content">
        <p class="judul">Program Kerja Sama Rumah Sakit Hewan Pendidikan dengan SMK Negeri Tutur</p>
        <p>Rumah Sakit Hewan Pendidikan menjalin kerja sama dengan SMK Negeri Tutur dalam rangka meningkatkan kompetensi siswa di bidang kesehatan hewan. Acara ini meliputi pelatihan langsung dan observasi lapangan.</p>
        <span>29 September 2023</span>
      </div>
    </div>
    <div class="berita-item">
      <img src="./aset/berita2.jpg" alt="Road To Pet Festival">
      <div class="berita-item-content">
        <p class="judul">Road To Pet Festival 2023 Vaksin Purevax Gratis</p>
        <p>Dalam rangka memeriahkan Road To Pet Festival, Rumah Sakit Hewan Pendidikan memberikan layanan vaksin Purevax gratis bagi kucing peliharaan warga sekitar. Acara ini berlangsung selama dua hari penuh.</p>
        <span>25-26 September 2023</span>
      </div>
    </div>
    <div class="berita-item">
      <img src="./aset/berita3.jpg" alt="World Rabies Day">
      <div class="berita-item-content">
        <p class="judul">World Rabies Day</p>
        <p>Peringatan Hari Rabies Sedunia diadakan untuk meningkatkan kesadaran masyarakat tentang bahaya rabies dan pentingnya vaksinasi hewan peliharaan.</p>
        <span>28 September 2023</span>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <h3>RUMAH SAKIT HEWAN PENDIDIKAN</h3>
  GEDUNG RS HEWAN PENDIDIKAN<br>
  rshp@fkh.unair.ac.id<br>
  Telp : 031 5927832<br>
  Kampus C Universitas Airlangga<br>
  Surabaya 60115, Jawa Timur
</footer>

</body>
</html>