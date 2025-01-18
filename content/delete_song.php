<?php
if (isset($_POST['file_url'])) {
    // Ambil file_url dari database
    $file_url = $conn->real_escape_string($_POST['file_url']); // Sanitasi input untuk mencegah SQL injection

    // Mengambil nama file dari file_url
    $file_name = basename($file_url); // Ambil nama file saja (misal: song1.mp3)

    // Membangun path lengkap untuk file yang akan dihapus
    $file_path = "assets/uploaded-songs/" . $file_name;

    // SQL query untuk menghapus item
    $sql = "DELETE FROM songs WHERE file_url = '$file_url'";

    if ($conn->query($sql) === TRUE) {
        // Cek apakah file tersebut ada, lalu hapus
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                // Optional: log keberhasilan penghapusan file
                error_log("File '$file_path' deleted successfully.");
            } else {
                // Optional: log kesalahan jika file tidak bisa dihapus
                error_log("Error deleting file '$file_path'.");
            }
        } else {
            // Optional: log jika file tidak ditemukan
            error_log("File '$file_path' not found.");
        }
    } else {
        // Optional: log kesalahan jika penghapusan dari database gagal
        error_log("Error deleting song from database: " . $conn->error);
    }
}

// Redirect kembali ke halaman playlist
echo "<script>window.location.href='index.php?page=playlist';</script>";
exit;
