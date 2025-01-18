<h2 id="memories" class="text-4xl tracking-tight text-center font-extrabold text-gray-900 dark:text-white mb-8">Memories
</h2>

<!-- Modal toggle -->
<div class="flex justify-start mb-4">
    <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-images mr-2"></i>
        <span>Tambah Memori</span>
    </button>
</div>

<div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
    <!-- Looping untuk menampilkan daftar memori -->
    <?php
    // Query database untuk mendapatkan semua memori
    $result = $conn->query("SELECT * FROM memories");
    if ($result && $result->num_rows > 0): // Check if the result is valid and has rows
        while ($row = $result->fetch_assoc()): // Loop through each memory
            // Construct the full path for the image
            $imagePath = "assets/upload/" . htmlspecialchars($row['picture']);
            ?>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">
                <a href="#">
                    <img class='rounded-t-lg w-full h-48 object-cover' src='<?php echo $imagePath; ?>'
                        alt='<?php echo htmlspecialchars($row['title']); ?>' />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-red-500">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h5>
                    </a>
                    <p class="mb-2 text-xs lg:text-lg md:text-sm text-gray-700 dark:text-gray-400">
                        <?php echo htmlspecialchars($row['text']); ?>
                    </p>
                    <p class="mb-2 text-xs lg:text-lg md:text-sm text-red-600 dark:text-green-400 flex items-center">
                        <?php
                        $bulan = array(
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        );

                        $tanggal = strtotime($row['created_at']);
                        $tgl = date('j', $tanggal); // Tanggal tanpa angka nol di depan
                        $bln = $bulan[date('n', $tanggal)]; // Nama bulan dari array
                        $thn = date('Y', $tanggal); // Tahun
                
                        echo htmlspecialchars($tgl . ' ' . $bln . ' ' . $thn);
                        ?>
                        <i class="fa fa-heart text-red-600 dark:text-green-400 ml-2" aria-hidden="true"></i>
                    </p>



                    <div class="flex justify-between">
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="javascript:void(0);"
                            onclick="confirmDeleteMemory(<?php echo htmlspecialchars($row['id']); ?>)">
                            <button
                                class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-red-700 text-sm font-medium mt-10 dark:text-yellow-300">belum ada memory</p>
    <?php endif; ?>
</div>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Memori
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="index.php?page=save_memory" method="POST" enctype="multipart/form-data" id="memoryForm">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Memori</label>
                        <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan judul memori" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea name="text" id="text" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Deskripsi memori" required></textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                            (Unggah File)</label>
                        <input type="file" name="picture" id="picture"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            accept="image/*" required>
                        <!-- Image preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <img id="preview" class="hidden max-w-xs h-auto rounded-lg" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="datepicker-format"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                            tanggal</label>
                        <input type="date" name="date" id="datepicker-format"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan tanggal" required>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Simpan Memori
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Hide the image preview on small screens (mobile) */
    @media (max-width: 640px) {
        #imagePreview {
            display: none;
            /* Hide the preview on mobile devices */
        }
    }

    /* Show the image preview on larger screens */
    @media (min-width: 641px) {
        #imagePreview {
            display: block;
            /* Show the preview on larger devices */
        }
    }
</style>

<script>
    // Preview the image when selected
    document.getElementById('picture').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden'); // Show the preview
                imagePreview.classList.remove('hidden'); // Show the imagePreview div
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('hidden'); // Hide the preview if no file is selected
            imagePreview.classList.add('hidden'); // Hide the imagePreview div
        }
    });


    function confirmDeleteMemory(id) {
        // Menampilkan alert konfirmasi dengan SweetAlert
        Swal.fire({
            title: 'Kamu yakin?',
            text: "Hapus aja kalo kamu yakin!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4c51bf',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yea yakin!',
            cancelButtonText: 'Gmww'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, redirect ke halaman delete_memory.php
                window.location.href = 'index.php?page=delete_memory&id=' + id;
            }
        });
    }




    document.getElementById('memoryForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Show loading alert
        Swal.fire({
            title: 'Loading...',
            text: 'Ditunggu bentar yakk hehehe...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        // Create a FormData object to send the form data
        const formData = new FormData(this);

        // Send the form data using Fetch API
        fetch(this.action, {
            method: this.method,
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // Close the loading alert
                Swal.close();

                // Check if the response indicates success
                if (data.success) {
                    // Show success alert
                    Swal.fire({
                        title: 'Yey berhasil!',
                        text: 'itemnya berhasil ditambah ya!',
                        icon: 'success',
                        confirmButtonColor: '#4c51bf', // Set your desired button color
                    }).then(() => {
                        location.reload(); // Optionally reload the page or redirect
                    });
                } else {
                    // Show error alert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was a problem saving your memory. Please try again.',
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Yey berhasil!',
                    text: 'itemnya berhasil ditambah ya!',
                    icon: 'success',
                    confirmButtonColor: '#4c51bf', // Set your desired button color
                }).then(() => {
                    location.reload(); // Optionally reload the page or redirect
                });
            });
    });


</script>