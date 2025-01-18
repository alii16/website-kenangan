<!-- Daftar Bucket List -->
<h2 class="text-4xl tracking-tight text-center font-extrabold text-gray-900 dark:text-white mb-8">Bucket List
</h2>

<!-- Form Tambah Item Bucket List -->
<div class="text-center mb-4">
    <form action="index.php?page=add_bucket" method="POST" class="flex justify-center items-center">
        <input type="text" name="item"
            class="text-sm border rounded-lg p-2 w-64 shadow-md focus:outline-none focus:ring-2 focus:ring-pink-500"
            placeholder="Ada yang mau ditambah ga?" required>
        <button type="submit"
            class="ml-2 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
            Tambah
        </button>
    </form>
</div>

<div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-4" id="bucket-list-container">
    <!-- Looping untuk menampilkan daftar bucket list -->
    <?php
    // Query database untuk mendapatkan semua bucket list
    $result = $conn->query("SELECT * FROM bucket_list");
    while ($row = $result->fetch_assoc()) {
        echo '<div class="flex items-center justify-between py-2 px-4 shadow-lg bg-gray-100 dark:bg-gray-900 rounded-lg">';
        echo '<div class="flex items-center mt-3">';
        echo '<form action="index.php?page=check_bucket" method="POST" class="inline">';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        echo '<input type="checkbox" name="is_checked" value="1" ' . ($row["is_checked"] ? 'checked' : '') . ' onchange="this.form.submit()" class="mr-2 rounded-lg h-5 w-5 border-gray-300 text-yellow-400 focus:ring-yellow-500">';

        // Menambahkan kelas `text-yellow-500` jika item di-check
        echo '<span class="ml-2 ' . ($row["is_checked"] ? 'line-through text-yellow-500' : 'text-sm font-medium text-gray-900 dark:text-white') . '">' . htmlspecialchars($row["item"]) . '</span>';
        echo '</form>';
        echo '</div>';
        echo '<form action="index.php?page=delete_bucket" method="POST" class="inline mt-3" onsubmit="return confirmDelete(event)">';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="text-red-500 hover:text-red-700 transition duration-200" title="Hapus">';
        echo '<i class="fas fa-trash-alt fa-lg"></i>'; // Font Awesome trash icon
        echo '</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>

<script>
    // Function to show the SweetAlert confirmation dialog
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        const form = event.target; // Get the form element

        Swal.fire({
            title: "Kamu yakin?",
            text: "hapus aja kalo kamu yakin!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#4c51bf",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yea yakin",
            cancelButtonText: "Gmww"
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                form.submit();
                // Optionally, show a success message
                Swal.fire({
                    title: "Dihapus!",
                    text: "Itemnya berhasil dihapus!",
                    icon: "success"
                });
            }
        });
    }
</script>