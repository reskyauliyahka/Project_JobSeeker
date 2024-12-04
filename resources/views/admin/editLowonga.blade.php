@extends('admin.templates.master')

@section('content')
    {{-- {{ $pekerjaan->pekerjaan }} --}}
    <div id="edit" class="w-1/2 mx-auto bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6" style="overflow-y: auto; max-height: 600px; min-height: 300px;margin-top:90px; margin-bottom:80px">
        <form action="{{ route('admin-updateLowongan', $pekerjaan->id) }}" method="POST" class="flex flex-col justify-center" enctype="multipart/form-data">
            <h1 class="text-2xl font-bold text-center mb-4">Perbarui Lowongan</h1>
            @csrf
            @method('PUT')

            <!-- Logo Perusahaan -->
            <div class="flex flex-col items-center mb-6">
                <label for="logo" class="text-md font-bold mb-2">Logo Perusahaan</label>
                <input type="file" id="logo" name="logo" value="{{ old('logo') }}" class="w-full p-2 border rounded-xl">
            </div>

            <!-- Grid untuk Input -->
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Kolom Kiri -->

                <!-- Kolom Tengah -->
                <div class="space-y-4 col-span-1">
                    <div class="space-y-2">
                        <label for="pekerjaan" class="text-md font-bold">Nama Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $pekerjaan->pekerjaan }}" class="w-full p-2 border rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label for="jenjangKarir" class="text-md font-bold">Jenjang Karir</label>
                        <input type="text" id="jenjangKarir" name="jenjangKarir" value="{{ $pekerjaan->jenjangKarir }}" class="w-full p-2 border rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label for="kontak" class="text-md font-bold">Kontak</label>
                        <input type="text" id="kontak" name="kontak" value="{{ $pekerjaan->kontak }}" class="w-full p-2 border rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label for="rentangGaji" class="text-md font-bold">Rentang Gaji</label>
                        <input type="text" id="rentangGaji" name="rentangGaji" value="{{ $pekerjaan->rentangGaji }}" class="w-full p-2 border rounded-xl">
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-4 col-span-1">
                    <div class="space-y-2">
                        <label for="perusahaan" class="text-md font-bold">Nama Perusahaan</label>
                        <input type="text" id="perusahaan" name="perusahaan" value="{{ $pekerjaan->perusahaan }}" class="w-full p-2 border rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label for="typePekerjaan" class="text-md font-bold">Type Pekerjaan</label>
                        <select id="typePekerjaan" name="typePekerjaan" class="w-full p-2 border rounded-xl">
                            <option value="">Pilih Type</option>
                            <option value="">Pilih Type</option>
                            <option value="full-time" {{ $pekerjaan->typePekerjaan == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                            <option value="part-time" {{ $pekerjaan->typePekerjaan == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                            <option value="freelance" {{ $pekerjaan->typePekerjaan == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="fungsi" class="text-md font-bold">Fungsi Pekerjaan</label>
                        <input type="text" id="fungsi" name="fungsi" value="{{ $pekerjaan->fungsi }}" class="w-full p-2 border rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label for="lokasi" class="text-md font-bold">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" value="{{ $pekerjaan->lokasi }}" class="w-full p-2 border rounded-xl">
                    </div>
                </div>

                <!-- Syarat Pekerjaan -->
                <div class="col-span-5 space-y-2">
                    <label for="syaratPekerjaan" class="text-md font-bold">Syarat Pekerjaan</label>
                    <textarea name="syaratPekerjaan" id="syaratPekerjaan" rows="4" class="w-full p-2 border rounded-xl">{{ $pekerjaan->syaratPekerjaan }}</textarea>
                </div>

                <!-- Deskripsi Pekerjaan -->
                <div class="col-span-5 space-y-2">
                    <label for="deskripsi" class="text-md font-bold">Deskripsi Pekerjaan</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full p-2 border rounded-xl">{{ $pekerjaan->deskripsi }}</textarea>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-center mt-6">
                <a href="{{ route('admin-kelolaLowongan') }}" class="no-underline font-bold text-white bg-blue-200 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Batal
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            </div>

            @if ($errors->any())
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-lg">
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
