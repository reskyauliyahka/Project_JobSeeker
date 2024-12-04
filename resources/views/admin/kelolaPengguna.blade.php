@extends('admin.templates.master')

@section('content')
    <!-- Tombol di Kanan Atas -->
    <div class="flex justify-end items-start mb-3 me-3" style="margin-top: 95px">
        <a href="{{ route('admin.create') }}"
            class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah Pengguna
        </a>
    </div>

    <div style="margin-bottom:80px">
        {{-- Container Daftar dan Index --}}
        <div id="main"  class="flex flex-col md:flex-row w-full justify-center">
            <!-- Statistik di Tengah -->
            <div>
                <div class="mx-4 space-y-3 mb-4">
                    <div
                        class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-md dark:text-gray-400">Total Pengguna</dt>
                        <dd class="text-center text-md font-semibold">{{$totalUser}}</dd>
                    </div>
                    <div
                        class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Admin</dt>
                        <dd class="text-center text-md font-semibold">{{$totalAdmin}}</dd>
                    </div>
                    <div
                        class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Penyedia</dt>
                        <dd class="text-center text-md font-semibold">{{$totalPenyedia}}</dd>
                    </div>
                    <div
                        class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Pelamar</dt>
                        <dd class="text-center text-md font-semibold">{{$totalPelamar}}</dd>
                    </div>
                </div>
            </div>

            <div>
                <div class="ms-4 pekerjaan-detail" style="overflow-y: auto;max-height: 500px;min-height: 300px;">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($users as $user)
                        <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
                            <h1 class="text-center text-xl font-bold">Data Pengguna</h1>
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama:</dt>
                            <dd class="text-md font-semibold">{{$user->name}}</dd>
                
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email:</dt>
                            <dd class="text-md font-semibold">{{$user->email}}</dd>
                
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Role:</dt>
                            <dd class="text-md font-semibold">{{$user->role}}</dd>
                
                            <hr>
                            <div class="flex justify-center p-2">
                                <a href="{{ url("/admin/$user->id/edit")}}" class="no-underline focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                                <form method="POST" action="{{ url("/admin/$user->id") }}"
                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Navigasi Pagination -->
                @if ($users->isNotEmpty())
                    <div class="mt-3 me-4 flex justify-center">
                        {{ $users->links('pagi') }}
                    </div>
                @endif

            </div>
            
    </div>

    
@endsection
