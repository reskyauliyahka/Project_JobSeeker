@extends('pelamar.templates.master')

@section('content')
    <div id="editBiodata" class="w-1/2 mx-auto ax-w-xs  bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
        style="margin-top:100px">
        <form action="{{ url("/pelamar/{$profile->pelamar_id}") }}" method="POST" class="p-5 flex flex-col justify-center "
            enctype="multipart/form-data">
            <h1 class="text-2xl font-bold text-center">Profile Pelamar</h1>
            @csrf
            @method('PUT')

            <div class="flex flex-col mt-3">
                <div>
                    <div class="flex-1">
                        <label for="foto_profil" class="text-md font-bold">Foto Pelamar</label>
                        <input type="file" id="foto_profil" name="foto_profil" value="{{ $profile->foto_profil }}"
                            class="w-full p-2 mt-2 border rounded-xl">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <!-- Nama Pelamar -->
                    <div class="flex-1">
                        <label for="nama" class="text-md font-bold">Nama Pelamar</label>
                        <input type="text" id="nama" name="nama" value="{{ $profile->nama }}"
                            class="w-full p-2 mt-2 rounded-xl">
                    </div>
                    <!-- Kontak Pelamar -->
                    <div class="flex-1">
                        <label for="kontak" class="text-md font-bold">Kontak</label>
                        <input type="email" id="kontak" name="kontak" value="{{ $profile->kontak }}"
                            class="w-full p-2 mt-2 rounded-xl">
                    </div>
                    <!-- Umur Pelamar -->
                    <div class="flex-1">
                        <label for="umur" class="text-md font-bold">Umur</label>
                        <input type="number" id="umur" name="umur" value="{{ $profile->umur }}"
                            class="w-full p-2 mt-2 rounded-xl">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                <!-- No Hp -->
                <div class="flex-1">
                    <label for="noHp" class="text-md font-bold">No/Hp Pelamar</label>
                    <input type="number" id="noHp" name="noHp" value="{{ $profile->noHp }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>
                <!-- Alamat Pelamar -->
                <div class="flex-1">
                    <label for="alamat" class="text-md font-bold">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ $profile->alamat }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>
                <!-- Tanggal Lahir Pelamar -->
                <div class="flex-1">
                    <label for="alamat" class="text-md font-bold">Tanggal Lahir</label>
                    <input type="date" id="tglLahir" name="tglLahir" value="{{ $profile->tglLahir }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">
                <!-- Jenis Kelamin -->
                <div class="flex-1"> 
                    <label for="jenis_kelamin" class="text-md font-bold">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 mt-2 rounded-xl">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Perempuan" {{ $profile->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                        <option value="Laki-laki" {{ $profile->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                    </select>
                </div>

                <!-- Jenjang Pendidikan Pelamar -->
                <div class="flex-1">
                    <label for="jenjang" class="text-md font-bold text-center">Jenjang Pendidikan</label>
                    <input type="text" id="jenjang" name="jenjang" value="{{ $profile->jenjang }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>
            </div>

            <!-- Deskripsi Pelamar -->
            <div class="mt-4">
                <label for="deskripsi" class="text-md font-bold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full p-2 mt-2 rounded-xl">{{ $profile->deskripsi }}</textarea>
            </div>

            <div class="mt-5 flex justify-center">
                <a href="{{ url()->previous() }}"
                    class="no-underline font-bold text-white bg-blue-200 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Batal
                </a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            </div>

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

    </form>
    </div>

@endsection
