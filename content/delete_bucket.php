<?php
// Check if an ID is provided for deletion
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize the input to prevent SQL injection

    // SQL query to delete the item
    $sql = "DELETE FROM bucket_list WHERE id = $id";
    $conn->query($sql);
}

// Redirect back to the bucket list page
echo "<script>window.location.href='index.php?page=bucket_list';</script>";
exit;
