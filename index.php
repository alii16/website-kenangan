<?php
require_once 'config/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ali & Putri</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">
</head>

<body class="bg-gray-100 dark:bg-gray-700">

    <!-- Sidebar -->
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-pink-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-red-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="assets/img/kita.jpg" class="h-10 me-3 rounded-full" alt="couple-icon" />
                        <span
                            class="self-center px-2 text-xl font-semibold sm:text-2xl whitespace-nowrap text-red-600 dark:text-red-600">Museum</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <!-- Theme Toggle Button -->
                        <button id="theme-toggle" type="button"
                            class="px-5 text-gray-900 dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 rounded-lg p-2 focus:outline-none">
                            <svg id="theme-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Light Mode Icon -->
                                <path id="light-icon"
                                    d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                    stroke-width="2y" stroke-linecap="round" stroke-linejoin="round" />
                                <!-- Dark Mode Icon -->
                                <path id="dark-icon" d="M21.8 16.4a10 10 0 1 1-8.8-14.4A10 10 0 0 0 21.8 16.4z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-pink-300 dark:focus:ring-red-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="assets/img/icon.png" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Ali & Putri
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    @aliiwithahoodie | @ghfrvt
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-red-200 dark:text-gray-300 dark:hover:bg-red-700 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-red-200 dark:text-gray-300 dark:hover:bg-red-700 dark:hover:text-white"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-red-200 dark:text-gray-300 dark:hover:bg-red-700 dark:hover:text-white"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-red-200 dark:text-gray-300 dark:hover:bg-red-700 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-900 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-900">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="index.php?page=home"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-house text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Home</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-4 ms-4 text-sm font-medium text-white bg-red-400 rounded-full dark:bg-red-800 dark:text-white">New</span>
                    </a>

                </li>
                <li>
                    <a href="index.php?page=gallery"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-images text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=memories"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-heart text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Memories</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=playlist"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-music text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Our Playlist</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=bucket_list"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-list-check text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Bucket List</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-4 ms-4 text-sm font-medium text-white bg-red-400 rounded-full dark:bg-red-800 dark:text-white">New</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=social_media"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-address-card text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">About Us</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=contact"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-pink-200 dark:hover:bg-red-700 group">
                        <i class="fas fa-phone text-gray-900 dark:text-white ml-2 mr-1"></i>
                        <span class="flex-1 whitespace-nowrap">Contact</span>
                    </a>
                </li>

            </ul>

        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="content">
                <?php
                $page = @$_GET['page'];

                if (empty($page)) {
                    include "content/home.php";
                } else {
                    include "content/$page.php";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Modal untuk meminta password -->
    <div id="passwordModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Masukkan Password</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-2xl p-2 ml-auto"
                        id="closeModal">
                        &times;
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <input type="password" id="passwordInput" placeholder="Masukkan password"
                        class="block w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-4 border-t">
                    <button type="button" id="submitPassword"
                        class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">Akses</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="sm:ml-64">


        <footer class="bg-white dark:bg-gray-900">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href=https://instagram.com/aliiwithahoodie/" class="flex items-center" target="_blank">
                            <img src="assets/img/icon.png" class="h-8 me-3 rounded-full" alt="AP Logo" />
                            <span class="self-center text-2xl font-bold whitespace-nowrap dark:text-white">Ali
                                Polanunu</span>
                        </a>
                    </div>
                </div>
                <hr class="my-3 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                        &copy; 2024 Our Memories. All rights reserved. | Made with ♥ by "us"
                    </span>

                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 21 16">
                                <path
                                    d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                            </svg>
                            <span class="sr-only">Twitter page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub account</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Dribbble account</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>

    <script>
        const modal = document.getElementById("passwordModal");
        const closeModalButton = document.getElementById("closeModal");
        const regretsLink = document.getElementById("regretsLink");
        const submitPasswordButton = document.getElementById("submitPassword");
        const passwordInput = document.getElementById("passwordInput");

        regretsLink.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah tautan mengarahkan ke halaman
            modal.classList.remove("hidden"); // Tampilkan modal
        });

        closeModalButton.addEventListener("click", function () {
            modal.classList.add("hidden"); // Sembunyikan modal
        });

        submitPasswordButton.addEventListener("click", function () {
            const password = passwordInput.value; // Ambil nilai password

            if (password === "aeko_regrets") {
                // Jika password benar, arahkan ke halaman regrets
                window.location.href = "index.php?page=aeko_regrets"; // Ganti dengan URL halaman regrets yang sebenarnya
            } else {
                // Tampilkan pesan kesalahan jika password salah
                alert("Password salah, kamu tidak bisa mengakses halaman ini.");
            }
        });
    </script>

</body>

</html>