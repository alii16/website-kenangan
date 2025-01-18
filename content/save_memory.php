<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $title = $_POST['title'];
    $description = $_POST['text'];
    $date = $_POST['date']; // Get the date input from the date picker

    // Initialize the response array
    $response = ['success' => false, 'message' => ''];

    // Validate the date input
    if (empty($date)) {
        $response['message'] = 'Tanggal tidak boleh kosong!';
        echo json_encode($response);
        exit;
    }

    // Check if the image file is uploaded
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        // Set the directory to store images
        $targetDir = "assets/upload/";
        
        // Get the file extension of the uploaded image
        $fileExtension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        
        // Create a unique file name
        $fileName = uniqid() . '.' . $fileExtension;
        
        // Full path to store the uploaded image
        $targetFile = $targetDir . $fileName;

        // Validate the file extension (allow only jpg, jpeg, png, gif)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
                // Prepare the SQL query to save memory data
                $sql = "INSERT INTO memories (title, text, picture, created_at) VALUES (?, ?, ?, ?)";

                // Use a prepared statement to avoid SQL Injection
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    // Bind the parameters
                    $stmt->bind_param("ssss", $title, $description, $fileName, $date); // Store the date as a string
                    
                    // Execute the query
                    if ($stmt->execute()) {
                        // Set success response
                        $response['success'] = true;
                        $response['message'] = 'Memori berhasil disimpan!';
                    } else {
                        // Set response for query execution failure
                        $response['message'] = 'Gagal menyimpan memori: ' . $stmt->error;
                    }

                    // Close the prepared statement
                    $stmt->close();
                } else {
                    // Set response if statement preparation fails
                    $response['message'] = 'Gagal mempersiapkan pernyataan!';
                }
            } else {
                // Set response if image upload fails
                $response['message'] = 'Gagal mengunggah gambar!';
            }
        } else {
            // Set response for invalid file extension
            $response['message'] = 'Ekstensi file tidak diizinkan!';
        }
    } else {
        // Set response if no file was uploaded
        $response['message'] = 'Harap pilih file gambar!';
    }

    // Output the response in JSON format
    echo json_encode($response);
}
