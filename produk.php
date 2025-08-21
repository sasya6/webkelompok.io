<?php
include 'includes/header.php';
include 'includes/db_koneksi.php';
?>

<h2 class="text-center text-success mb-4">Semua Produk Kami</h2>

<div class="row">
    <?php
    $sql = "SELECT * FROM produk ORDER BY tanggal_ditambahkan DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
            echo '  <div class="card h-100">';
            echo '    <img src="' . htmlspecialchars($row["gambar"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["nama_produk"]) . '">';
            echo '    <div class="card-body d-flex flex-column">';
            echo '      <h5 class="card-title text-success">' . htmlspecialchars($row["nama_produk"]) . '</h5>';
            echo '      <p class="card-text text-muted small">' . htmlspecialchars(substr($row["deskripsi"], 0, 80)) . '...</p>';
            echo '      <div class="mt-auto">';
            echo '          <a href="detail_produk.php?id=' . $row["id"] . '" class="btn btn-outline-success btn-sm">Lihat Detail</a>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    } else {
        echo "<p class='text-center col-12'>Belum ada produk yang tersedia saat ini.</p>";
    }
    $conn->close();
    ?>
</div>

<?php include 'includes/footer.php'; ?>