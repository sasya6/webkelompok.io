<?php
include 'includes/header.php';
include 'includes/db_koneksi.php';
?>

<h2 class="text-center text-success mb-4">Galeri Produk Kami</h2>

<div class="row" id="gallery-container">
    <?php
    $sql = "SELECT gambar, nama_produk FROM produk ORDER BY tanggal_ditambahkan DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
            echo '  <a href="' . htmlspecialchars($row["gambar"]) . '" data-lightbox="produk-gallery" data-title="' . htmlspecialchars($row["nama_produk"]) . '">';
            echo '    <img src="' . htmlspecialchars($row["gambar"]) . '" class="img-fluid rounded shadow-sm gallery-item" alt="' . htmlspecialchars($row["nama_produk"]) . '">';
            echo '  </a>';
            echo '  <p class="text-center mt-2 text-muted small">' . htmlspecialchars($row["nama_produk"]) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p class='text-center col-12'>Belum ada gambar di galeri.</p>";
    }
    $conn->close();
    ?>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
</script>

<?php include 'includes/footer.php'; ?>