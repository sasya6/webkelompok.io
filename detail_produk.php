<?php
include 'includes/header.php';
include 'includes/db_koneksi.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="row mt-5">
            <div class="col-md-6 text-center">
                <img src="<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid rounded shadow-sm" alt="<?php echo htmlspecialchars($row['nama_produk']); ?>" style="max-height: 500px; object-fit: contain;">
            </div>
            <div class="col-md-6">
                <h1 class="text-success"><?php echo htmlspecialchars($row['nama_produk']); ?></h1>
                <p class="lead text-muted"><?php echo ucfirst(htmlspecialchars($row['jenis_produk'])); ?></p>
                <hr>
                <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>
                <a href="produk.php" class="btn btn-outline-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali ke Produk</a>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="alert alert-warning text-center mt-5" role="alert">Produk tidak ditemukan.</div>';
    }
    $stmt->close();
} else {
    echo '<div class="alert alert-danger text-center mt-5" role="alert">ID Produk tidak valid.</div>';
}
$conn->close();
?>

<?php include 'includes/footer.php'; ?>