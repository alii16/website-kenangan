<?php
// Check if an ID is provided for checking
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize the input to prevent SQL injection
    $is_checked = isset($_POST['is_checked']) ? 1 : 0; // Determine if checked or not

    // SQL query to update the checked status
    $sql = "UPDATE bucket_list SET is_checked = $is_checked WHERE id = $id";
    $conn->query($sql);
}

// Redirect back to the bucket list page
echo "<script>window.location.href='index.php?page=bucket_list';</script>";
exit;
