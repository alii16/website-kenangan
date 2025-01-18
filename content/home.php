<div class="gap-8 items-center mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-4 lg:px-6">
    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">We are just kids trying to
            be lovers</h2>
        <p class="mb-4">I remember
            that first night we stayed up pass 3am and all we did was talk. I remember thinking that I could
            listen
            to
            your talk forever, and how I've never felt that way about anyone before. I remember that night at
            3am,
            that
            was the moment I fell in love.</p>
        <p>- unrequired feelings</p>

        <!-- Timer Section -->
        <div class="mt-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <p class="text-sm lg:text-xl font-semibold text-center">We've been together for (23 May 2024) :</p>
            <div class="flex justify-center mt-2">
                <span id="days"
                    class="timer text-xs lg:text-xl font-medium badge bg-indigo-700 text-white mr-2 px-2 py-2 rounded-md"></span>
                <span id="hours"
                    class="timer text-xs lg:text-xl font-medium badge bg-indigo-700 text-white mr-2 px-2 py-2 rounded-md"></span>
                <span id="minutes"
                    class="timer text-xs lg:text-xl font-medium badge bg-indigo-700 text-white mr-2 px-2 py-2 rounded-md"></span>
                <span id="seconds"
                    class="timer text-xs lg:text-xl font-medium badge bg-indigo-700 text-white px-2 py-2 rounded-md"></span>
            </div>

            <div class="flex justify-center mt-2">
                <div class="text-xs text-green-600 dark:text-green-500 font-semibold mt-1">Still Going</div>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-4 mt-8">
        <img class="w-full rounded-lg" src="assets/img/home-a.jpg" alt="ali">
        <img class="mt-4 w-full lg:mt-10 rounded-lg" src="assets/img/home-g.jpg" alt="putri">
    </div>




</div>



<script>
    function updateTimer() {
        // Tanggal pacaran
        const startDate = new Date('2024-05-23 00:00:00').getTime();
        // Waktu sekarang
        const now = new Date().getTime();

        // Hitung selisih waktu
        const elapsedTime = now - startDate;

        // Hitung hari, jam, menit, dan detik
        const days = Math.floor(elapsedTime / (1000 * 60 * 60 * 24));
        const hours = Math.floor((elapsedTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);

        // Update tampilan timer di halaman
        document.getElementById('days').innerText = days + " Day" + (days > 1 ? "s" : "");
        document.getElementById('hours').innerText = hours + " Hour" + (hours > 1 ? "s" : "");
        document.getElementById('minutes').innerText = minutes + " Minute" + (minutes > 1 ? "s" : "");
        document.getElementById('seconds').innerText = seconds + " Second" + (seconds > 1 ? "s" : "");

    }

    // Panggil updateTimer setiap detik
    setInterval(updateTimer, 1000);
</script>