@extends('pelamar.templates.master')

@section('content')
    <!-- Hero Section -->
    <div id="hero" class="p-4 flex flex-col md:flex-row justify-center bg-blue-100" style="margin-top: 80px;">
        <div class="flex justify-center items-center flex-col ">
            <h1 class="text-2xl font-bold ">Selamat Datang, {{ Auth::user()->name }}</h1>
            <div class="deskripsi">
                <h6>Temukan Karier Impianmu di Sini</h6>
            </div>

            <!-- Filter Dropdown dan Search -->
            <form class="max-w-lg mx-auto mb-8" action="{{ route('cariLowonganPelamar') }}" method="GET">
                <div class="flex">
                    <!-- Dropdown Kategori -->
                    <label for="kategori" class="mb-2 text-sm font-medium text-gray-900 sr-only">Kategori</label>
                    <select name="kategori" id="kategori" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriOptions as $option)
                        <option value="{{ $option }}" {{ request('kategori') == $option ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                        @endforeach
                    </select>
                    <!-- Search Input -->
                    <div class="relative w-full">
                        <input type="search" name="search" id="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Pekerjaan" value="{{ request('search') }}" />
                        <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/bgUtama.png') }}" alt="">
        </div>
    </div>

    <!-- Bantu Kariermu Melaju Lebih Cepat -->
     <div id="karir" class="mt-4">
        <h3 class="text-xl text-center font-bold">Bantu Kariermu Melaju Lebih Cepat</h3>
        <div class="flex flex-col md:flex-row items-center justify-center gap-8">

            <div class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img1.png') }}" alt="" />
                </a>
                <div class="text-center p-3">
                    <a href="https://www.cimbniaga.co.id/id/inspirasi/karir/cara-membuat-cv-yang-menarik-agar-dilirik-hrd" target="_blank">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">5 Langkah Membuat CV <br>yang Menarik Perekrut</h4>
                    </a>
                </div>
            </div>
            <div class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img6.png') }}" alt="" />
                </a>
                <div class="text-center p-3">
                    <a href="https://www.liputan6.com/regional/read/5424505/simak-begini-cara-cerdas-mencari-lowongan-kerja" target="_blank">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Cara Cerdas <br>Mencari Lowongan</h4>
                    </a>
                </div>
            </div>
            <div class=" mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img2.png') }}" alt="" />
                </a>
                <div class="text-center p-3">
                    <a href="https://www.liputan6.com/feeds/read/5789458/cara-mencari-peluang-panduan-lengkap-untuk-menemukan-kesempatan-emas" target="_blank">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Menemukan Peluang <br>Pekerjaan</h4>
                    </a>
                </div>
            </div>
        </div>
     </div>

     {{-- Lowongan Rating Tertinngi --}}
     <div class="mt-5 bg-blue-100 mx-5 rounded-lg px-3 pt-3 pb-4" id="lowongan">
        <h3 class="text-xl text-center font-bold">
            Lowongan dengan Rating Tertinggi
        </h3>
        <div class="flex flex-col md:flex-row justify-center gap-3">
            @foreach ($avgRatings as $rating)
            <div class="ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex gap-8 items-center">
                    <img src="{{ asset('storage/' .$rating->jobPosts->logo) }}" alt="" class="w-20 h-20  object-cover">
                    <div class="">
                        <dd class="text-lg font-bold ">{{ $rating->jobPosts->pekerjaan }}</dd>
                        <dd class="text-md text-blue-500 font-semibold">{{ $rating->jobPosts->perusahaan }}</dd>
                        <dd class="text-md font-semibold text-blue-500">
                            {{ $rating->jobPosts->rentangGaji }}
                        </dd>
                        <dd>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($rating->avg_rating))
                                    <i class="fa fa-star text-yellow-400"></i> <!-- Bintang Penuh -->
                                @elseif ($i - $rating->avg_rating < 1)
                                    <i class="fa fa-star-half-alt text-yellow-400"></i> <!-- Bintang Setengah -->
                                @else
                                    <i class="fa fa-star text-gray-300"></i> <!-- Bintang Kosong -->
                                @endif
                            @endfor
                        </dd>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
     </div>

     {{-- Langkah --}}
     <div id="langkah" class="mt-4">
        <h3 class="text-xl text-center font-bold">4 Langkah Memulai untuk Pelamar</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
            <div class="">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img3.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/pelamar/img4.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
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
                        <h5>Daftar Akun<br><span class="text-base">Masukkan nama, email, dan buat kata sandi.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">2</h2>
                        <h5>Lengkapi Profil<br><span class="text-base">Tambahkan biodata, pendidikan, dan deskripsi singkat Anda.</span></h5>
                    </div>
                    <div class="mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">3</h2>
                        <h5>Cari Pekerjaan<br><span class="text-base">Gunakan fitur pencarian untuk menemukan pekerjaan yang cocok.</span></h5>
                    </div>
                    <div class=" mt-4 flex gap-8 bg-gray-100 p-4 rounded-lg">
                        <h2 class="text-white bg-blue-500 rounded-full w-12 h-12 text-center">4</h2>
                        <h5>Lamar Pekerjaan<br><span class="text-base">Klik Lamar Sekarang dan pantau status lamaran Anda.
                        </span></h5>
                    </div>                    
                </div>
            </div>
        </div>
     </div>

     {{--  --}}
     <div class="mt-2" style="margin-bottom: 70px">
        <div id="daftar" class="flex flex-col md:flex-row justify-center bg-blue-100 mx-5 rounded-lg items-center">
            <div>
                <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}" alt="">
            </div>
            <div class="flex flex-col text-center items-center">
                <h5 class="text-base">Tunggu apa lagi</h5>
                <h1 class="text-2xl font-bold">Cari Lowongan dan Pantau Status<br>Lamaran Hari Ini</h1>
                <a href="{{route('cariLowonganPelamar')}}" class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="width: 25rem; text-align: center;">
                    Cari Lowongan
                </a>
                <a href="{{ route('pelamar.appliedJobs', ['id' => Auth::id()]) }}" class="no-underline text-blue-500 bg-white border border-blue-500 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-blue-100 dark:hover:border-gray-600 dark:focus:ring-gray-700" style="width: 25rem; text-align: center;">
                    Pantau Status Lamaran
                </a>
            </div>

        </div>
     </div>
@endsection