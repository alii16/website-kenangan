<!-- Gallery -->
<h2 class="text-4xl tracking-tight text-center font-extrabold text-gray-900 dark:text-white mb-8">Gallery</h2>

<div class="flex justify-left mb-4">
    <p class="text-pink-400 hover:text-pink-900 dark:text-yellow-300 font-medium">Preview:</p>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/1.jpeg" alt="Memory 1">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/2.jpeg" alt="Memory 2">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/3.jpeg" alt="Memory 3">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/4.jpeg" alt="Memory 4">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/5.jpeg" alt="Memory 5">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/6.jpeg" alt="Memory 6">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/7.jpeg" alt="Memory 7">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/8.jpeg" alt="Memory 8">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/9.jpeg" alt="Memory 9">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/10.jpeg" alt="Memory 10">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/11.jpeg" alt="Memory 11">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="assets/img/12.jpeg" alt="Memory 12">
        </div>
    </div>
</div>

<!-- Links for adding gallery and viewing all photos -->
<div class="flex justify-between">
    <button onclick="openUploadDialog()"
        class="inline-flex items-center mb-4 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-image mr-2"></i>
        <span>Tambah Foto</span>
    </button>
    <button onclick="window.location.href='index.php?page=view_all_photos'"
        class="inline-flex items-center mb-4 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-image mr-2"></i>
        <span>Lihat Foto</span>
    </button>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css">
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
</script>