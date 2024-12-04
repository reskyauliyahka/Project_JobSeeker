@extends('penyedia.templates.master')

@section('content')
    <!-- Hero Section -->
    <div id="hero" class="p-4 flex flex-col md:flex-row justify-center items-center bg-blue-100 p-3" style="margin-top: 80px;">
        <div class="flex justify-center flex-col ">
            <h1 class="text-2xl font-bold">Temukan Kandidat Terbaik untuk<br>Perusahaan Anda</h1>
            <div class="deskripsi">
                <h6>Buat, Kelola, dan Awasi Lamaran dengan Mudah</h6>
            </div>

            <a href="{{route('kelolaLowongan')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 no-underline"  style="width: 15rem;" >
                Buat Lowongan Baru
            </a> 
    
        </div>
        <div>
            <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/bgUtama.png') }}" alt="">
        </div>
    </div>

    <!-- Mengapa mencari Pekerjaan -->
     <div id="alasan" class="mt-4">
        <h3 class="text-xl text-center font-bold">Kelola Lowongan dengan Mudah</h3>
        <div class="flex flex-col md:flex-row justify-center gap-8 items-center">

            <div class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img6.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Buat Lowongan Baru</h4>
                    </div>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Lengkapi deskripsi pekerjaan, syarat, dan informasi gaji</p>
                </div>
            </div>
            <div class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img1.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Pantau Lamaran</h4>
                    </div>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Lihat daftar pelamar dan status aplikasi mereka.</p>
                </div>
            </div>
            <div class=" mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img2.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Tingkatkan Jangkauan</h4>
                    </div>
                    <p class="w-1/2 mx-auto text-gray-700 dark:text-gray-400">Promosikan lowongan Anda kepada ribuan pencari kerja</p>
                </div>
            </div>
        </div>
     </div>

     <div id="langkah" class="mt-4">
        <h3 class="text-xl text-center font-bold">4 Langkah Memulai Pencarian Kandidat</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
            <div class="">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/penyedia/img1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/penyedia/img2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/penyedia/img3.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/penyedia/img4.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    {{-- <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div> --}}
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
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
                        <h5>Buat Akun Perusahaan<br><span class="text-base">Lengkapi informasi perusahaan Anda.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">2</h2>
                        <h5>Buat Lowongan Pekerjaan<br><span class="text-base">Tulis deskripsi pekerjaan dan kriteria pencarian Anda.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">3</h2>
                        <h5>Pantau Lamaran<br><span class="text-base">Lihat dan evaluasi pelamar dengan mudah.</span></h5>
                    </div>
                    <div class=" mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">4</h2>
                        <h5>Pilih Kandidat Terbaik<br><span class="text-base">Hubungi kandidat dan mulai proses rekrutmen.
                        </span></h5>
                    </div>                    
                </div>
            </div>
        </div>
     </div>

     <div style="margin-bottom: 80px">
        <div id="daftar" class="flex flex-col md:flex-row justify-center bg-blue-100 mx-5 rounded-lg items-center">
            <div>
                <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}" alt="">
            </div>
            <div class="flex flex-col text-center items-center">
                <h5 class="text-base">Tunggu apa lagi</h5>
                <h1 class="text-2xl font-bold">Daftar dan Temukan <br>Kandidat Terbaik Hari Ini</h1>
                <a href="{{route('kelolaLowongan')}}" class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="width: 25rem; text-align: center;">
                    Buat Lowongan Baru
                </a>
                <a href="{{route('applicants.index2')}}" class="no-underline text-blue-500 bg-white border border-blue-500 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-blue-100 dark:hover:border-gray-600 dark:focus:ring-gray-700" style="width: 25rem; text-align: center;">
                    Kelola Lowongan Aktif Anda
                </a>
            </div>

        </div>
     </div>
@endsection