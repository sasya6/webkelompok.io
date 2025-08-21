<?php
// Muat kelas PHPMailer dari vendor
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

include 'includes/header.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email_pengirim = htmlspecialchars($_POST['email']);
    $pesan_kontak = htmlspecialchars($_POST['pesan']);

    $mail = new PHPMailer(true);

    try {
        // Pengaturan Server SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kkmbunigeulis@gmail.com';  
        $mail->Password   = 'inikkmbunigeulis';     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Pengaturan Penerima dan Pengirim
        $mail->setFrom($email_pengirim, $nama);      // Dari: Pengunjung
        $mail->addAddress('kkmbunigeulis@gmail.com'); // <-- Ganti dengan email tujuan Anda
        $mail->addReplyTo($email_pengirim, $nama);    // Email balasan akan ke pengunjung

        // Konten Email
        $mail->isHTML(false); // Atur email sebagai teks biasa
        $mail->Subject = 'Pesan Baru dari Formulir Kontak Web';
        $mail->Body    = "Nama: {$nama}\nEmail: {$email_pengirim}\nPesan:\n{$pesan_kontak}";

        $mail->send();
        $message = '<div class="alert alert-success mt-4" role="alert">Terima kasih, <strong>' . $nama . '</strong>! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.</div>';
    } catch (Exception $e) {
        $message = '<div class="alert alert-danger mt-4" role="alert">Pesan gagal dikirim. Error: ' . $mail->ErrorInfo . '</div>';
    }
}
?>

<h2 class="text-center text-success mb-4">Hubungi Kami</h2>
<?php echo $message; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <p class="text-center mb-4">Punya pertanyaan atau ingin tahu lebih banyak tentang produk kami? Jangan ragu untuk menghubungi kami!</p>
        <form action="" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
                <div class="invalid-feedback">Nama lengkap diperlukan.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Email yang valid diperlukan.</div>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Anda</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                <div class="invalid-feedback">Pesan tidak boleh kosong.</div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">Kirim Pesan</button>
            </div>
        </form>

        <hr class="my-5">

        <h3 class="text-success mb-3">Informasi Kontak Lainnya</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fas fa-phone-alt me-2 text-success"></i> Telepon: +62 812-9759-9882</li>
            <li class="list-group-item"><i class="fas fa-envelope me-2 text-success"></i> Email: kkmbunigeulis@gmail.com</li>
            <li class="list-group-item"><i class="fas fa-map-marker-alt me-2 text-success"></i> Alamat: Jl. Fatahillah, Watubelah, Kec. Sumber, Kabupaten Cirebon, Jawa Barat</li>
        </ul>
        <div class="mt-4 text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2261603961265!2d108.49086277475534!3d-6.742244893254053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e3b7b1cda1b%3A0xe6245844d4697b1!2sUniversitas%20Muhammadiyah%20Cirebon%20Kampus%202!5e0!3m2!1sen!2sid!4v1755747711880!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>