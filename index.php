<?php 
include 'includes/header.php'; 
include 'includes/db_koneksi.php';
?>

<section class="hero-section text-center py-5 mb-5">
    <img src="img/images.jpg" alt="Pupuk dan Produk Melinjo" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover;">
    <h1>Pupuk Organik Cair & Inovasi Melinjo Unggul</h1>
    <p class="lead text-muted">Meningkatkan kesuburan tanah dan menghadirkan cita rasa baru dengan produk alami kami.</p>
    <a href="produk.php" class="btn btn-success btn-lg mt-3">Jelajahi Produk Kami</a>
</section>

<hr class="my-5">

<section class="about-us-section py-4">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="img/orangbertani.jpeg" alt="Orang Bertani" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <h2 class="text-success mb-3">Filosofi Kami</h2>
            <p>Inovasi ini lahir dari semangat memberdayakan potensi lokal sekaligus melestarikan warisan kuliner Indonesia. Melinjo, yang selama ini identik dengan emping, kami olah menjadi tepung sebagai bentuk pemanfaatan sumber daya desa yang melimpah namun belum tergali maksimal. </p>
            <p>Dengan menjadikannya tepung, nastar, serta brownis yang lekat dengan tradisi dan momen kebersamaan. Kami ingin menyampaikan pesan bahwa sesuatu yang sederhana dan lokal pun bisa bernilai tinggi jika diolah dengan kreatif serta menjadi simbol transformasi dari yang biasa menjadi luar biasa, dari yang terpinggirkan menjadi unggulan.</p>
        </div>
    </div>
</section>

<hr class="my-5">

<section class="featured-products py-4">
    <h2 class="text-center text-success mb-4">Produk Unggulan Kami</h2>
    <div class="row">
        <?php
        $sql_featured = "SELECT * FROM produk ORDER BY tanggal_ditambahkan DESC LIMIT 3";
        $result_featured = $conn->query($sql_featured);

        if ($result_featured->num_rows > 0) {
            while($row = $result_featured->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '  <div class="card h-100">';
                echo '    <img src="' . htmlspecialchars($row["gambar"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["nama_produk"]) . '">';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-title">' . htmlspecialchars($row["nama_produk"]) . '</h5>';
                echo '      <p class="card-text text-muted small">' . htmlspecialchars(substr($row["deskripsi"], 0, 90)) . '...</p>';
                echo '      <a href="detail_produk.php?id=' . $row["id"] . '" class="btn btn-outline-success btn-sm">Lihat Detail</a>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo "<p class='text-center col-12'>Belum ada produk unggulan yang tersedia.</p>";
        }
        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>