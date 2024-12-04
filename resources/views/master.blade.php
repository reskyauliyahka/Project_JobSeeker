<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobScout</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        @media (max-width: 768px) {
            #hero {
                flex-direction: column-reverse;
            }
        }
    </style>
</head>

<body>

    <nav class="z-50 bg-blue-700 border-gray-200 dark:bg-gray-900 fixed top-0 w-full">
        <div class="flex justify-between items-center mx-auto max-w-screen-xl p-4">
            <!-- Logo dan Judul -->
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/JobScout4.png') }}" class="h-10 rounded-full" alt="Flowbite Logo" />
                <span class="ml-3 text-2xl text-white font-semibold dark:text-white">JobScout</span>
            </div>
    
            <!-- Hamburger Menu -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
    
            <!-- Link Navigasi Tengah (Desktop) -->
            <div id="menu" class="hidden md:flex space-x-6 rtl:space-x-reverse">
                <a href="#hero" class="text-lg text-white font-medium no-underline hover:underline">Cari Pekerjaan</a>
                <a href="#alasan" class="text-lg text-white font-medium no-underline hover:underline">Kenapa Bergabung</a>
                <a href="#langkah" class="text-lg text-white font-medium no-underline hover:underline">Dapatkan Pekerjaan</a>
            </div>
    
            <!-- Placeholder untuk elemen di sebelah kanan -->
            <div class="hidden md:flex w-12 gap-6 me-5">
                <a href="{{ route('login') }}" class="text-lg text-white font-medium no-underline hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-lg text-white font-medium no-underline hover:underline">Register</a>
            </div>
        </div>
    
        <!-- Link Navigasi Tengah (Mobile) -->
        <div id="mobile-menu" class="hidden bg-blue-700  md:hidden">
            <a href="#hero" class="block py-2 px-4 text-lg text-white font-medium no-underline hover:bg-blue-800">Cari Pekerjaan</a>
            <a href="#alasan" class="block py-2 px-4 text-lg text-white font-medium no-underline hover:bg-blue-800">Kenapa Bergabung</a>
            <a href="#langkah" class="block py-2 px-4 text-lg text-white font-medium no-underline hover:bg-blue-800">Dapatkan Pekerjaan</a>
            <div class="flex flex-col gap-2 mt-2 mb-3 px-4">
                <a href="{{ route('login') }}" class="text-lg text-white font-medium no-underline hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-lg text-white font-medium no-underline hover:underline">Register</a>
            </div>
        </div>
    </nav>
    
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
    
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    


    <!-- Hero Section -->
    <div id="hero" class="p-4 flex flex-col md:flex-row justify-center bg-blue-100 items-center space-y-4 md:space-y-0 md:space-x-4" style="margin-top: 80px;">
        <div class="text-center flex justify-center items-center flex-col">
            <h1 class="text-2xl font-bold">Temukan Pekerjaan Impianmu <br>Dengan JobScout</h1>
            <div class="deskripsi mt-2">
                <h6>Dapatkan pekerjaan cocok sesuai profil Anda saat ini.</h6>
            </div>


            <!-- Filter Dropdown dan Search -->
            <form class="max-w-lg mx-auto mb-8 mt-2" action="{{ route('cariLowongan') }}" method="GET">
                <div class="flex">
                    <!-- Dropdown Kategori -->
                    <label for="kategori" class="mb-2 text-sm font-medium text-gray-900 sr-only">Kategori</label>
                    <select name="kategori" id="kategori"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoriOptions as $option)
                            <option value="{{ $option }}" {{ request('kategori') == $option ? 'selected' : '' }}>
                                {{ ucfirst($option) }}</option>
                        @endforeach
                    </select>
                    <!-- Search Input -->
                    <div class="relative w-full">
                        <input type="search" name="search" id="search"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari Pekerjaan" value="{{ request('search') }}" />
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="">
            <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/bgUtama.png') }}" alt="">
        </div>
    </div>

    <!-- Mengapa mencari Pekerjaan -->
    <div id="alasan" class="mt-4">
        <h3 class="text-xl text-center font-bold">Mengapa mencari pekerjaan di JobScout?</h3>
        <div class="flex justify-center items-center gap-8 flex-col md:flex-row">

            <div
                class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img4.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Profil & CV Generator
                        </h4>
                    </div>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Buat profil sesuai dengan
                        dibutuhkan dan siapkan CV Anda</p>
                </div>
            </div>
            <div
                class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img1.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Status Lamaran</h4>
                    </div>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Pantau status lamaran terbaru
                        Anda dari awal-akhir dengan mudah</p>
                </div>
            </div>
            <div
                class=" mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img3.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Profil Matching & Job
                            Alert </h4>
                    </div>
                    <p class="w-1/2 mx-auto text-gray-700 dark:text-gray-400">Dapatkan informasi lowongan yang cocok
                        dengan profil Anda</p>
                </div>
            </div>
        </div>
    </div>

    <div id="langkah" class="mt-4">
        <h3 class="pt-3 text-xl text-center font-bold">4 Langkah Mendapatkan Pekerjaan baru Anda</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 p-5 gap-5">
            <div class="">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img1.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img2.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img3.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img4.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            <div>
                <div class="">
                    <div class="flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">1</h2>
                        <h5>Daftar dan Buat Akun Baru <br><span class="text-base">Mulai perjalanan karir Anda
                                sekarang.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">2</h2>
                        <h5>Lengkapi Profil Sesuai Biodata Anda<br><span class="text-base">Tampilkan keahlian dan
                                pengalaman terbaik.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">3</h2>
                        <h5>Cari dan Temukan Lowongan Sesuai<br><span class="text-base">Gunakan filter untuk peluang
                                terbaik.</span></h5>
                    </div>
                    <div class=" mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">4</h2>
                        <h5>Lamar dan Tunggu Proses Seleksi<br><span class="text-base">Kirim lamaran dan pantau
                                statusnya.</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div id="daftar" class="flex flex-col md:flex-row justify-center bg-blue-100 mx-5 rounded-lg items-center">
            <div>
                <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}" alt="">
            </div>
            <div class="flex flex-col text-center items-center">
                <h5 class="text-base">Tunggu apa lagi</h5>
                <h1 class="text-2xl font-bold">Daftar dan dapatkan pekerjaan Anda hari ini</h1>
                <a href="{{ route('login') }}"
                    class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    style="width: 25rem; text-align: center;">Buat Akun</a>
                <a href="{{ route('login') }}"
                    class="no-underline text-blue-500 bg-white border border-blue-500 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-blue-100 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    style="width: 25rem; text-align: center;">Apakah Anda HR dan Membuat Lowongan?</a>
            </div>

        </div>
    </div>



    <footer class="z-50 bg-blue-700  shadow dark:bg-gray-900 mt-4">
        <span class="p-3 block text-sm text-white text-center dark:text-white">© 2024 JobScout™. All Rights
            Reserved.
        </span>
    </footer>


</body>

</html>
