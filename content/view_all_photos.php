<!-- Galleri -->
<h2 class="text-4xl tracking-tight text-center font-extrabold text-gray-900 dark:text-white mb-8">Gallery</h2>

<!-- Tombol Tambah Foto -->
<div class="flex justify-between">
    <button onclick="window.location.href='index.php?page=gallery'"
        class="inline-flex items-center mb-4 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-arrow-left mr-2"></i>
        <span>Kembali</span>
    </button>
    <button onclick="openUploadDialog()" 
        class="inline-flex items-center mb-4 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-image mr-2"></i>
        <span>Tambah Foto</span>
    </button>
</div>

<!-- Make sure to include the Font Awesome library in your HTML -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<div class="grid grid-cols-2 md:grid-cols-4 gap-2">
    <!-- Looping untuk menampilkan foto -->
    <?php
    // Query database untuk mendapatkan semua foto
    $result = $conn->query("SELECT * FROM images");
    while ($row = $result->fetch_assoc()) {
        echo '<div class="w-full">';
        echo '<div class="relative">';
        echo '<img class="object-contain w-full h-auto rounded-lg" src="assets/uploaded-img/' . $row["image_url"] . '" alt="Memory ' . $row["id"] . '">';
        echo '<button class="absolute top-4 right-2 text-red-600 font-bold rounded flex items-center" onclick="hapusFoto(' . $row["id"] . ')">
        <i class="fas fa-trash-alt fa-lg"></i> <!-- Ikon trash -->
        </button>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    async function openUploadDialog() {
        const { value: file } = await Swal.fire({
            title: "Pilih Gambar",
            input: "file",
            inputAttributes: {
                "accept": "image/*",
                "aria-label": "Unggah foto Anda"
            },
            showCancelButton: true,
            confirmButtonText: 'Unggah',
            cancelButtonText: 'Gjadi',
            // Kustomisasi warna tombol
            customClass: {
                confirmButton: 'bg-indigo-700 text-white hover:bg-indigo-800',
                cancelButton: 'bg-red-700 text-white hover:bg-red-800'
            },
        });

        if (file) {
            const reader = new FileReader();
            reader.onload = async (e) => {
                // Tampilkan preview gambar yang di-upload
                await Swal.fire({
                    title: "Ini foto yang kamu unggah?",
                    imageUrl: e.target.result,
                    imageAlt: "Gambar yang diunggah",
                    confirmButtonText: 'Iyee',
                    // Kustomisasi warna tombol
                    customClass: {
                        confirmButton: 'bg-indigo-700 text-white hover:bg-indigo-800'
                    },
                });
                // Show loading alert
                Swal.fire({
                    title: 'Loading...',
                    text: 'Ditunggu bentar yakk hehehe...',
                    showConfirmButton: false,
                    showCloseButton: false, // Disable close button
                    allowOutsideClick: false, // Prevent closing by clicking outside
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Kirim file ke server
                const formData = new FormData();
                formData.append('photo', file);

                // Kirim ke server menggunakan fetch
                fetch('index.php?page=upload_img', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        // Tampilkan alert sukses jika foto berhasil diunggah
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Yey foto berhasil ditambahkan ke galeri!',
                            icon: 'success',
                            confirmButtonText: 'Aight',
                            // Kustomisasi warna tombol
                            customClass: {
                                confirmButton: 'bg-indigo-700 text-white hover:bg-indigo-800'
                            },
                        }).then(() => {
                            location.reload(); // Reload halaman untuk melihat foto baru
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Yah error :(',
                            text: 'Terjadi masalah saat mengunggah foto.',
                            icon: 'error'
                        });
                    });
            };
            reader.readAsDataURL(file);
        }
    }

    function hapusFoto(id) {
        Swal.fire({
            title: 'Kamu yakin?',
            text: 'Hapus aja kalo kamu yakin!',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yea yakin',
            cancelButtonText: 'Gmww',
            confirmButtonColor: "#4c51bf",
            cancelButtonColor: "#d33"

        })
            .then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, redirect ke delete_img.php
                    window.location.href = 'index.php?page=delete_img&id=' + id;
                }
            });
    }
</script>