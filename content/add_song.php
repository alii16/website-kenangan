<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file_url'])) {
    $target_dir = "assets/uploaded-songs/";
    $target_file = $target_dir . basename($_FILES["file_url"]["name"]);
    $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi tipe file
    if ($audioFileType !== 'mp3') {
        echo "Hanya file MP3 yang diperbolehkan.";
        exit;
    }

    // Validasi ukuran file
    if ($_FILES["file_url"]["size"] > 7000000) { // Maksimal 7MB
        echo "Ukuran file terlalu besar.";
        exit;
    }

    // Coba unggah file
    if (move_uploaded_file($_FILES["file_url"]["tmp_name"], $target_file)) {
        // Simpan metadata lagu ke database
        $title = $conn->real_escape_string($_POST['title']);
        $artist = $conn->real_escape_string($_POST['artist']);

        // Menyiapkan SQL query untuk menyimpan data
        $sql = "INSERT INTO songs (title, artist, file_url) VALUES ('$title', '$artist', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Lagu berhasil diunggah.";
        } else {
            echo "Gagal menyimpan data lagu ke database: " . $conn->error; // Menambahkan detail error
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah lagu.";
    }
} else {
    echo "Request tidak valid.";
}
