<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $target_dir = "assets/uploaded-img/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi tipe file
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        exit;
    }

    // Validasi ukuran file
    if ($_FILES["photo"]["size"] > 2500000) {
        echo "Ukuran file terlalu besar.";
        exit;
    }

    // Validasi format file
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        exit;
    }

    // Coba unggah file
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Simpan ke database
        $sql = "INSERT INTO images (image_url) VALUES ('" . basename($_FILES["photo"]["name"]) . "')";
        if ($conn->query($sql) === TRUE) {
            echo "Foto berhasil diunggah."; // Return success message
        } else {
            echo "Gagal menyimpan data foto ke database.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah foto.";
    }
}
