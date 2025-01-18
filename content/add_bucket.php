<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Check if the form has been submitted
if (isset($_POST['item'])) {
    $item = $conn->real_escape_string($_POST['item']); // Sanitize the input to prevent SQL injection

    // SQL query to insert a new bucket list item
    $sql = "INSERT INTO bucket_list (item) VALUES ('$item')";
    if ($conn->query($sql) === TRUE) {
        // If the insert was successful, set a success message
        echo "<script>
        Swal.fire({
            title: 'Yey berhasil!',
            text: 'itemnya berhasil ditambah ya!',
            icon: 'success',
            confirmButtonColor: '#3085d6', // Set your desired button color
            customClass: {
                confirmButton: 'btn-confirm' // Add a custom class
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                window.location.href = 'index.php?page=bucket_list';
            }
        });
      </script>";

    } else {
        // If there was an error, show an error message
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Could not add the item. Please try again.',
                    icon: 'error'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?page=bucket_list';
                    }
                });
              </script>";
    }
    exit;
}
