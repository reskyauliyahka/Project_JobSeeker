@extends('admin.templates.master')

@section('content')
    <div id="edit" class="w-1/2 mx-auto ax-w-xs p-6 bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-2" style="margin-top: 110px">
        <form action="{{ url("/admin/{$user->id}") }}" method="POST" >
            <h1 class="text-lg font-bold text-center">Edit Pengguna</h1>
            @csrf
            @method('PUT')
            <div
                class="ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-2">
                <div class="flex-1 mt-2">
                    <label for="name" class="text-md font-bold">Username</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>

                <!-- Email -->
                <div class="flex-1 mt-2">
                    <label for="email" class="text-md font-bold">Email</label>
                    <input type="text" id="email" name="email" value="{{ $user->email }}"
                        class="w-full p-2 mt-2 rounded-xl">
                </div>

                <!-- Role -->
                <div class="flex-1 mt-2">
                    <label for="role" class="text-md font-bold">Role</label>
                    <select id="role" name="role" class="w-full p-2 mt-2 rounded-xl">
                        <option value="">Pilih Type</option>
                        <option value="penyedia" {{ $user->role == 'penyedia' ? 'selected' : '' }}>Penyedia</option>
                        <option value="pelamar" {{ $user->role == 'pelamar' ? 'selected' : '' }}>Pelamar</option>

                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-8 flex justify-center ">
                    <a href="{{ route('admin-kelolaPengguna') }}"
                        class="no-underline font-bold text-white bg-blue-200 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                        Batal
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
