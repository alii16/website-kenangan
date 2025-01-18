<?php
// Periksa apakah ID sudah diterima melalui GET
if (isset($_GET['id'])) {
    // Ambil nilai ID dari URL
    $id = $_GET['id'];
    // Query untuk mendapatkan detail memori (khususnya nama file gambar)
    $query = "SELECT picture FROM memories WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $memory = $result->fetch_assoc();

    if ($memory) {
        // Path file di folder assets/upload/
        $filePath = 'assets/upload/' . $memory['picture'];

        // Hapus record memori dari database
        $deleteQuery = "DELETE FROM memories WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            // Cek apakah file tersebut ada, lalu hapus
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    // Jika file berhasil dihapus
                    echo "<script>alert('Memory berhasil dihapus ya bejir!'); window.location.href = 'index.php?page=memories';</script>";
                } else {
                    // File tidak bisa dihapus
                    echo "<script>alert('Bejir! memory gagal dihapus'); window.location.href = 'index.php?page=memories';</script>";
                }
            } else {
                // File tidak ditemukan
                echo "<script>alert('Memory berhasil dihapus tapi filenya ga bejir!'); window.location.href = 'index.php?page=memories';</script>";
            }
        } else {
            // Memori gagal dihapus dari database
            echo "<script>alert('Gagal jirrr!'); window.location.href = 'index.php?page=memories';</script>";
        }
    } else {
        // Memori tidak ditemukan di database
        echo "<script>alert('Memory nya ga ditemukan jir!'); window.location.href = 'index.php?page=memories';</script>";
    }

    // Tutup statement
    $stmt->close();
    $deleteStmt->close();
    $conn->close();
} else {
    // ID tidak valid
    echo "<script>alert('Permintaan ga invalid ya bejir'); window.location.href = 'index.php?page=memories';</script>";
}
