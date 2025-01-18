<?php
// Mengambil lagu dari database
$sql = "SELECT title, artist, file_url FROM songs";
$result = $conn->query($sql);

$songs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $songs[] = $row;
    }
}

// Cari lagu
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT title, artist, file_url FROM songs";
if (!empty($searchTerm)) {
    $sql .= " WHERE title LIKE '%$searchTerm%' OR artist LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);

$songs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $songs[] = $row;
    }
}

?>

<h2 class="text-4xl tracking-tight text-center font-extrabold text-gray-900 dark:text-white mb-8">Our Playlist</h2>

<div class="flex justify-start">
    <button onclick="openAddSongDialog()" id="addSongButton"
        class="inline-flex items-center mb-4 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
        <i class="fas fa-music mr-2"></i>
        <span>Tambah Lagu</span>
    </button>
</div>

<!-- Form Pencarian Lagu -->
<div class="text-center mb-4">
    <form id="searchForm" onsubmit="return searchSong()" class="flex justify-center items-center">
        <input type="text" id="searchInput" placeholder="Cari lagu atau artis"
            class="text-sm border rounded-lg p-2 w-60 shadow-md focus:outline-none focus:ring-2 focus:ring-pink-500">
        <button type="submit"
            class="ml-2 px-3 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 dark:text-gray-800 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-600">
            Cari Lagu
        </button>
    </form>
</div>

<ul id="playlist" class="mb-2 grid grid-cols-1 md:grid-cols-3 gap-2">
    <?php foreach ($songs as $song): ?>
        <li class="songs">
            <div id="songList">
                <div
                    class="flex items-center justify-between bg-gray-100 dark:bg-gray-900 p-3 shadow-lg rounded-lg hover:shadow-lg transition-shadow">

                    <button
                        onclick="playAudio('<?php echo $song['file_url']; ?>', '<?php echo $song['title']; ?>', '<?php echo $song['artist']; ?>')"
                        class="flex items-center w-full text-left">

                        <!-- Song Title and Artist -->
                        <div class="flex-1 mr-4">
                            <p
                                class="text-md lg:text-lg font-semibold text-indigo-700 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-500">
                                <?php echo $song['title']; ?>
                            </p>
                            <p class="text-sm lg:text-lg text-gray-500 dark:text-gray-400">
                                <?php echo $song['artist']; ?>
                            </p>
                        </div>

                        <!-- Play Icon -->
                        <i class="fas fa-play fa-lg text-pink-400 dark:text-yellow-300"></i>
                    </button>

                    <!-- Form for delete action -->
                    <form action="index.php?page=delete_song" method="POST" onsubmit="return confirmDelete(event, this);">
                        <input type="hidden" name="file_url" value="<?php echo $song['file_url']; ?>">
                        <button type="submit" class="flex items-center">
                            <i class="fas fa-trash-alt ml-6 fa-lg text-red-500 hover:text-red-600 cursor-pointer"
                                style="margin-top: 1rem;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>


<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Define confirmDelete function -->
<script>
    function searchSong() {
        const searchQuery = document.getElementById('searchInput').value.trim();
        if (searchQuery !== '') {
            // Redirect to the desired URL format
            window.location.href = `index.php?page=playlist&search=${encodeURIComponent(searchQuery)}`;
        }
        return false; // Prevent form submission
    }


    function confirmDelete(event, form) {
        event.preventDefault(); // Prevent the form from submitting immediately

        Swal.fire({
            title: "Kamu yakin?",
            text: "Hapus aja kalo kamu yakin!",
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
                    icon: "success",
                    confirmButtonColor: "#4c51bf",
                    confirmButtonText: "Aight"


                });
            }
        });
    }
</script>






<audio id="audioPlayer" class="hidden"></audio>

<!-- Modal for Audio Controls -->
<div id="audioModal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-96 shadow-lg hover:shadow-lg transition-shadow">
        <h2 id="modalSongTitle" class="text-lg font-semibold text-center text-indigo-700 dark:text-indigo-400 mb-2">Song
            Title</h2>
        <h3 id="modalArtistName" class="text-md text-center text-gray-600 dark:text-gray-300 mb-4">Artist Name</h3>
        <div class="flex items-center justify-between mb-4">
            <button onclick="playPauseAudio(this)"
                class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                <i class="fas fa-play"></i>
            </button>
            <input type="range" class="seekBar w-1/2 h-1 bg-gray-300 rounded-lg cursor-pointer"
                onchange="updateSeekBar(this)" />
            <span class="currentTime text-sm text-gray-500">00:00</span>
            <span class="durationTime text-sm text-gray-500">00:00</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">Volume:</span>
            <input type="range" class="volumeControl w-1/4 h-1 bg-gray-300 rounded-lg cursor-pointer" min="0" max="1"
                step="0.01" value="1" onchange="updateVolume(this)" />
        </div>
        <div class="flex justify-center">
            <button onclick="closeModal()"
                class="mt-4 w-1/2 max-w-xs bg-red-600 text-white font-medium rounded-lg py-2 hover:bg-red-700">
                Tutup
            </button>
        </div>
    </div>
</div>



<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    async function openAddSongDialog() {
        const { value: formValues } = await Swal.fire({
            title: 'Tambah Lagu',
            html: `
                <form id="addSongForm" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label for="title" class="block text-md font-medium text-gray-700">Judul Lagu</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    </div>
                    <div>
                        <label for="artist" class="block text-md font-medium text-gray-700">Artis</label>
                        <input type="text" name="artist" id="artist" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    </div>
                    <div>
                        <label for="file_url" class="block text-md font-medium text-gray-700">File MP3</label>
                        <input type="file" name="file_url" id="file_url" accept=".mp3" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    </div>
                </form>
            `,
            focusConfirm: false,
            preConfirm: () => {
                const formData = new FormData(document.getElementById('addSongForm'));
                const file = document.getElementById('file_url').files[0];
                formData.append('file_url', file);
                return formData;
            },
            showCancelButton: true,
            confirmButtonText: 'Tambah',
            cancelButtonText: 'Gjadi',
            confirmButtonColor: "#4c51bf",
            cancelButtonColor: "#d33"
        });

        if (formValues) {
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

            // Kirim ke server menggunakan fetch
            fetch('index.php?page=add_song', {
                method: 'POST',
                body: formValues
            })
                .then(response => response.text())
                .then(data => {
                    // Cek jika data berisi pesan sukses atau error
                    if (data.includes("berhasil diunggah")) {
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Lagunya sudah ditambahkan ya!',
                            icon: 'success',
                            confirmButtonText: 'Aight',
                            confirmButtonColor: "#4c51bf",

                        }).then(() => {
                            location.reload(); // Reload halaman untuk melihat lagu baru
                        });
                    } else {
                        // Jika bukan sukses, tampilkan pesan error
                        Swal.fire({
                            title: 'Gagal jir!',
                            text: 'Gatau ya, mungkin filenya bukan format mp3, sudah ada atau ukurannya lebih dari 7mb', // Tampilkan pesan error dari server
                            icon: 'error',
                            confirmButtonText: 'Aight',
                            confirmButtonColor: "#4c51bf",

                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi masalah saat mengunggah lagu: ' + error.message,
                        icon: 'error'
                    });
                });
        }
    }

    let audioPlayer = document.getElementById('audioPlayer');
    let currentButton = null; // Variabel untuk menyimpan tombol lagu yang sedang diputar

    function playAudio(path, title, artist, button) {
        audioPlayer.src = path;
        document.getElementById('modalSongTitle').textContent = title;
        document.getElementById('modalArtistName').textContent = artist;

        let modal = document.getElementById('audioModal');
        modal.classList.remove('hidden'); // Show modal

        audioPlayer.removeEventListener('loadedmetadata', updateMetadata);
        audioPlayer.removeEventListener('timeupdate', updateTime);

        audioPlayer.addEventListener('loadedmetadata', updateMetadata);
        audioPlayer.addEventListener('timeupdate', updateTime);

        if (currentButton) {
            currentButton.querySelector('i').classList.remove('fa-pause');
            currentButton.querySelector('i').classList.add('fa-play');
        }
        currentButton = button;
        audioPlayer.play();
        button.querySelector('i').classList.remove('fa-play');
        button.querySelector('i').classList.add('fa-pause');
    }

    function closeModal() {
        let modal = document.getElementById('audioModal');
        modal.classList.add('hidden');
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
        if (currentButton) {
            currentButton.querySelector('i').classList.remove('fa-pause');
            currentButton.querySelector('i').classList.add('fa-play');
        }
    }

    function playPauseAudio(button) {
        if (audioPlayer.paused) {
            audioPlayer.play();
            button.querySelector('i').classList.remove('fa-play');
            button.querySelector('i').classList.add('fa-pause');
        } else {
            audioPlayer.pause();
            button.querySelector('i').classList.remove('fa-pause');
            button.querySelector('i').classList.add('fa-play');
        }
    }

    function updateMetadata() {
        document.querySelector('.durationTime').textContent = formatTime(audioPlayer.duration);
    }

    function updateTime() {
        document.querySelector('.currentTime').textContent = formatTime(audioPlayer.currentTime);
        document.querySelector('.seekBar').value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    }

    function formatTime(time) {
        let minutes = Math.floor(time / 60);
        let seconds = Math.floor(time % 60);
        return `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
    } function updateSeekBar(seekBar) {
        let
            seekTo = audioPlayer.duration * (seekBar.value / 100); audioPlayer.currentTime = seekTo;
    } function
        updateVolume(volumeControl) { audioPlayer.volume = volumeControl.value; } </script>