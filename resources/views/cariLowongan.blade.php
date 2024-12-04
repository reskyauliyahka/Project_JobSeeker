<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @media (max-width: 768px) {
            #main {
                align-items: center;
            }
            .pekerjaan-detail{
                width: 80%;
            }
        }
    </style>

</head>
<body class="bg-blue-100" >
    <div class="flex gap-6 bg-white p-2 px-4 rounded-lg shadow-md top-0 w-full">
        {{-- icon Beranda --}}
        <a href="{{route('homeMaster')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
            </svg>    
        </a>
        
        {{-- End Icon Beranda --}}
        
        <form action="#" method="GET" class="w-full">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Kategori Filter -->
                <div class="flex flex-col">
                    <label for="kategori" class="mb-2 font-medium text-gray-700">Kategori Pekerjaan</label>
                    <select name="kategori" id="kategori" class="bg-gray-50 border border-gray-300 rounded-md p-2">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoriOptions as $kategori)
                            <option value="{{ $kategori }}">{{ ucfirst($kategori) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Lokasi Filter -->
                <div class="flex flex-col">
                    <label for="lokasi" class="mb-2 font-medium text-gray-700">Lokasi</label>
                    <select name="lokasi" id="lokasi" class="bg-gray-50 border border-gray-300 rounded-md p-2">
                        <option value="">Pilih Lokasi</option>
                        @foreach ($lokasiOptions as $lokasi)
                            <option value="{{ $lokasi }}">{{ ucfirst($lokasi) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Type Pekerjaan Filter -->
                <div class="flex flex-col">
                    <label for="type_pekerjaan" class="mb-2 font-medium text-gray-700">Tipe Pekerjaan</label>
                    <select name="type_pekerjaan" id="type_pekerjaan" class="bg-gray-50 border border-gray-300 rounded-md p-2">
                        <option value="">Pilih Tipe Pekerjaan</option>
                        @foreach ($typeOptions as $type)
                            <option value="{{ $type }}">{{ucfirst($type)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="rentangGaji" class="mb-2 font-medium text-gray-700">Rentang Gaji</label>
                    <select name="rentangGaji" id="rentangGaji" class="bg-gray-50 border border-gray-300 rounded-md p-2">
                        <option value="">Pilih Rentang Gaji</option>
                        @foreach ($gajiOptions as $gaji)
                            <option value="{{ $gaji }}">{{ ucfirst($gaji) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-3 flex justify-center">
                <div class="flex w-1/2 gap-2">
                    <!-- Input Search -->
                    <input type="search" name="search" id="search" 
                    class="block flex-1 px-3 py-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Cari Pekerjaan " value="{{ request('search') }}" />
    
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="flex-shrink-0 px-3 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div style="margin-bottom: 20px">
        <div id="main" class="flex flex-col w-full justify-center md:flex-row" style="margin-top: 20px; "> 
            <div>
                <div class="overflow-y-auto h-96 w-1/3 ">
                    @foreach ($daftarPekerjaan as $pekerjaan2)
                    <div class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-2">
                        <div class="flex gap-4 items-center">
                            @if ($pekerjaan2->logo)
                                <img src="{{ asset('storage/' . $pekerjaan2->logo) }}" 
                                alt="Logo" 
                                class="w-20 h-20  object-cover mx-auto mb-4 ">
                            @else
                                <img class="w-20 h-20  object-cover mb-4 " src="https://via.placeholder.com/80" alt="Foto Profil">
                            @endif
                            <div>
                                <h5 class="my-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $pekerjaan2->pekerjaan }}
                                </h5> 
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $pekerjaan2->perusahaan }}</p>
                            </div>
                        </div>
                        @php
                            $isLowonganTutup = \Carbon\Carbon::parse($pekerjaan2->updated_at)->diffInDays(now()) > 30;
                        @endphp
                        @if ($isLowonganTutup)
                            <p class="text-center text-red-500 font-semibold">Lowongan sudah tutup</p>
                        @endif
                        <div class="bg-gray-100 rounded-md py-2 px-3">
                            <p class="flex gap-2 items-center font-normal text-gray-700 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                                {{ $pekerjaan2->lokasi }}
                            </p>
                            <p class="flex gap-2 items-center font-normal text-gray-700 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-arrow-up-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zm.192 8.159 6.57-4.027L8 9.586l1.239-.757.367.225A4.49 4.49 0 0 0 8 12.5c0 .526.09 1.03.256 1.5H2a2 2 0 0 1-1.808-1.144M16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z"/>
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354 1.25 1.25a.5.5 0 0 1-.708.708L13 12.207V14a.5.5 0 0 1-1 0v-1.717l-.28.305a.5.5 0 0 1-.737-.676l1.149-1.25a.5.5 0 0 1 .722-.016"/>
                                </svg>
                                {{ $pekerjaan2->kontak }}
                            </p>
                            <p class="flex gap-2 items-center font-normal text-gray-700 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                </svg>
                                {{ $pekerjaan2->rentangGaji }}
                            </p>
                        </div>
    
                        <a href="{{ route('cariLowongan', ['id' => $pekerjaan2->id]) }}"
                            class="mt-3 w-full flex justify-center text-white bg-blue-700 no-underline hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Rincian  
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- Navigasi Pagination -->
                @if ($daftarPekerjaan->isNotEmpty())
                    <div class="mt-3 me-3 flex justify-center">
                        {{ $daftarPekerjaan->links('pagi') }}
                    </div>
                @endif
            
            </div>   
    
            {{-- Detail Pekerjaan --}}
            @if ($pekerjaan)
            {{-- @dd($pekerjaan) --}}
            <div class="w-1/2 mx-4 pekerjaan-detail" style="overflow-y: auto;max-height: 500px;min-height: 300px; ">
                {{-- Bagian Atas --}}
                <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row gap-6 items-center justify-center">
                        <img src="{{ asset('storage/' . $pekerjaan->logo) }}" alt="" class="w-48 h-48  object-cover">
                        <div class="">
                            <dd class="text-xl font-bold ">{{$pekerjaan->pekerjaan}}</dd>
                            <dd class="text-lg text-blue-500 font-semibold">{{$pekerjaan->perusahaan}}</dd>
                            <dd class="text-lg font-semibold text-blue-500">{{$pekerjaan->rentangGaji}}</dd>
                        </div>
                        <div>
                            <a href="{{route('login')}}" class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lamar</a>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between space-x-4 mt-3">
                            <p class="flex items-center gap-2  text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                                Dibuat {{$pekerjaan->created_at->format('d M Y')}}</p>
                            <p class="flex items-center gap-2  text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                Diperbarui {{$pekerjaan->updated_at->format('d M Y')}}
                            </p>
                        </div>
                        <hr>

                        <nav class="border-gray-200 dark:bg-gray-900 w-full">
                            <div class="flex flex-col md:flex-row justify-between items-center mx-auto max-w-screen-xl p-4">
                                <a href="#informasi" class="text-md no-underline font-medium dark:text-blue-500 hover:underline">Informasi Lowongan</a>
                                <a href="#syarat" class="text-md no-underline font-medium dark:text-blue-500 hover:underline">Persyaratan</a>
                                <a href="#lokasi2" class="text-md no-underline font-medium dark:text-blue-500 hover:underline">Lokasi</a>
                                <a href="#ulasan" class="text-md no-underline font-medium dark:text-blue-500 hover:underline">Penilaian</a>
                            </div>
                        </nav>
                    </div>
                </div>
    
                {{-- Informasi Lowongan --}}
                <div class="mt-4 ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" id="informasi">
                    <h4 class="text-xl font-bold text-blue-500">Informasi Lowongan</h4>
                    <div class="flex flex-col md:flex-row justify-between">
                        <div class="flex flex-col">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Type Pekerjaan</dt>
                            <dd class="text-md font-semibold">{{$pekerjaan->typePekerjaan}}</dd>
                        </div>
    
                        <div class="flex flex-col">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Fungsi Pekerjaan</dt>
                            <dd class="text-md font-semibold">{{$pekerjaan->fungsi}}</dd>
                        </div>
    
                        <div class="flex flex-col">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenjang Karir</dt>
                            <dd class="text-md font-semibold">{{$pekerjaan->jenjangKarir}}</dd>
                        </div>
                    </div>
                    <div class="mt-2 text-justify" style="width: 70%">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Deskripsi Pekerjaan</dt>
                        <dd class="text-md font-semibold">{{ $pekerjaan->deskripsi }}</dd>
                    </div>
                </div>
    
                {{-- Persyaratan --}}
                <div class="mt-4 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" id="syarat">
                    <h4 class="text-xl font-bold text-blue-500">Persyaratan</h4>
                    <div class="mt-2 text-justify" style="width: 70%">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Syarat Pekerjaan</dt>
                        <dd class=" text-md font-semibold">
                            <ul class="max-w-md space-y-1 list-disc list-inside dark:text-gray-400" style="list-style-position: outside; padding-left: 1.5rem;">
                                @foreach(explode(PHP_EOL, $pekerjaan->syaratPekerjaan) as $syarat)
                                    <li>{{ trim($syarat) }}</li>
                                @endforeach
                            </ul>
                        </dd>
                    </div>
                </div>
    
                {{-- Lokasi Pekerjaan --}}
                <div class="mt-4 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" id="lokasi2">
                    <h4 class="text-xl font-bold text-blue-500">Lokasi</h4>
                    <div class="flex justify-between">
                        <div>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Lokasi</dt>
                            <dd class="text-md font-semibold">{{$pekerjaan->lokasi}}</dd>
                        </div>
                        <div>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Kontak</dt>
                            <dd class="text-md font-semibold">{{$pekerjaan->kontak}}</dd>
                        </div>
                    </div>
                </div>

                {{-- Rating Pekerjaan --}}
                <div class="mt-4 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" id="ulasan">
                    <div>
                        <h4 class="text-xl font-bold text-blue-500">Ulasan</h4>
                        <div>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Rating</dt>
                            <dd class="text-md font-semibold">
                                {{-- @dd($pekerjaan->average_rating); --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($pekerjaan->average_rating))
                                        <i class="fa fa-star text-yellow-400"></i> <!-- Bintang Penuh -->
                                    @elseif ($i - $pekerjaan->average_rating < 1)
                                        <i class="fa fa-star-half-alt text-yellow-400"></i> <!-- Bintang Setengah -->
                                    @else
                                        <i class="fa fa-star text-gray-300"></i> <!-- Bintang Kosong -->
                                    @endif
                                @endfor
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Ulasan</dt>
                            <dd class="text-md font-semibold">
                                @php
                                    $filteredRatings = $pekerjaan->ratings->filter(function ($rating) {
                                        return !empty($rating->ulasan);
                                    });
                                @endphp
                            
                                @if($filteredRatings->isNotEmpty())
                                    <ul class="mt-2 space-y-2">
                                        @foreach($filteredRatings as $rating)
                                            <li class="border p-2 rounded">
                                                <p><strong>{{ $rating->user->name ?? 'Anonim' }}:</strong> {{ $rating->ulasan }}</p>
                                                <p class="text-sm text-gray-400">{{ $rating->created_at->format('d M Y') }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-gray-500">Belum ada ulasan untuk pekerjaan ini.</p>
                                @endif
                            </dd>
                        </div>

                    </div>

                </div>
            </div>
            @else
            <div class="mx-4 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-auto">
                <p class="text-center"><em>Tekan rincian untuk melihat informasi pekerjaan.</em></p>
                <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}" alt="Gambar Deskripsi">   
            </div>
            
            @endif
        </div>
        
    </div>

</body>
</html>
