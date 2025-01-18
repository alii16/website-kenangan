<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil nama file gambar dari database
    $result = $conn->query("SELECT image_url FROM images WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($row) {
        // Hapus file dari folder
        $file = "assets/uploaded-img/" . $row['image_url'];
        if (file_exists($file)) {
            unlink($file);
        }

        // Hapus data dari database
        $conn->query("DELETE FROM images WHERE id = $id");
    }
    
    echo '<script>window.location.href = "index.php?page=view_all_photos";</script>'; // Redirect menggunakan JavaScript
}
