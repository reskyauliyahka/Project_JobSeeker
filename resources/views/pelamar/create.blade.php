<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('components2.message')

    <div class="grid grid-cols-1 md:grid-cols-2 p-5 pe-5">
        <div class="relative w-full">
            <!-- Gambar -->
            <img src="{{ asset('img/img7.png') }}" alt="" class="h-auto max-w-full mx-auto rounded-lg">

            <!-- Teks di bawah gambar -->
            <div class="absolute bottom-0 left-0 w-full flex flex-col items-center bg-white/80 p-4 text-black">
                <div
                    class="p-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-11/12 md:w-1/2">
                    <h1 class="text-2xl font-bold text-center">Isi Profil Terlebih Dahulu</h1>
                    <p class="text-lg text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            style="overflow-y: auto;max-height: 600px;min-height: 300px; ">
            <form action="{{ url('/pelamar') }}" method="POST"
                class="bg-blue-100 p-4 flex flex-col justify-center rounded-lg " enctype="multipart/form-data">
                <h1 class="text-2xl font-bold text-center">Profile Pelamar</h1>
                @csrf

                <!-- Row 1 -->

                <div class="flex space-x-4 mt-4">
                    <!-- Profile Pelamar -->
                    <div class="flex-1">
                        <label for="foto_profil" class="text-md font-bold">
                            <img class="w-20 h-20 rounded-full" src="https://via.placeholder.com/80" alt="Foto Profil">
                        </label>
                        <input type="file" id="foto_profil" name="foto_profil" value="{{ old('foto_profil') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>

                    <!-- Nama Pelamar -->
                    <div class="flex-1 ">
                        <label for="nama" class="text-md font-bold">Nama Pelamar</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="w-full p-2 mt-2 border rounded-xl">

                        <label for="kontak" class="text-md font-bold mt-4 block">Email</label>
                        <input type="email" id="kontak" name="kontak" value="{{ old('kontak') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="flex space-x-4 mt-4">
                    <!-- No HP -->
                    <div class="flex-1">
                        <label for="noHp" class="text-md font-bold">Nomor Hp</label>
                        <input type="number" id="noHp" name="noHp" value="{{ old('noHp') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>

                    <!-- Alamat -->
                    <div class="flex-1">
                        <label for="alamat" class="text-md font-bold">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="flex space-x-4 mt-4">
                    <!-- Tanggal Lahir -->
                    <div class="flex-1">
                        <label for="tglLahir" class="text-md font-bold">Tanggal Lahir</label>
                        <input type="date" id="tglLahir" name="tglLahir" value="{{ old('tglLahir') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>

                    <!-- Umur -->
                    <div class="flex-1">
                        <label for="umur" class="text-md font-bold">Umur</label>
                        <input type="number" id="umur" name="umur" value="{{ old('umur') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="flex space-x-4 mt-4">
                    <!-- Jenis Kelamin -->
                    <div class="flex-1">
                        <label class="block text-md font-bold">Jenis Kelamin</label>
                        <div class="flex flex-col mt-2">
                            <label class="flex items-center mr-4">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                    class="form-radio text-blue-600">
                                <span class="ml-2 text-sm">Pria</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                    class="form-radio text-blue-600">
                                <span class="ml-2 text-sm">Wanita</span>
                            </label>
                        </div>
                    </div>

                    <!-- Jenjang Pendidikan -->
                    <div class="flex-1">
                        <label for="jenjang" class="text-md font-bold">Jenjang Pendidikan</label>
                        <input type="text" id="jenjang" name="jenjang" value="{{ old('jenjang') }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label for="deskripsi" class="text-md font-bold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full p-2 mt-2 rounded-xl">{{ old('deskripsi') }}</textarea>
                </div>


                <div class="mt-5 flex justify-center">
                    {{-- <a href="{{ route('login') }}"
                        class="no-underline font-bold text-white bg-blue-200 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Batal
                    </a> --}}
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Selanjutnya
                    </button>
                </div>
            
            
            </form>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</body>

</html>
