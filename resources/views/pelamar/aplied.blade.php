@extends('pelamar.templates.master')

@section('content')
    {{-- Menu --}}
    <div style="margin-top: 110px; margin-bottom:70px">
        {{-- Container Daftar dan Index --}}
        <div class="flex flex-col md:flex-row w-full justify-center">
            <!-- Statistik di Tengah -->
            <div class="mb-4">
                <div class="mx-4 space-y-6">
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-md dark:text-gray-400">Total Lowongan</dt>
                        <dd class="text-center text-md font-semibold">{{$totalLowongan}}</dd>
                    </div>
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Diterima</dt>
                        <dd class="text-center text-md font-semibold">{{$lowonganDiterima}}</dd>
                    </div>
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-center mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Ditolak</dt>
                        <dd class="text-center text-md font-semibold">{{$lowonganDitolak}}</dd>
                    </div>
                </div>
            </div>

            <div class="mx-4 pekerjaan-status" style="overflow-y: auto;max-height: 500px;min-height: 300px; ">
                @if ($appliedJobs->isEmpty())
                    <p class="text-center"><em>Anda belum melamar pekerjaan apapun.</em></p>
                    <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}"
                        alt="Gambar Deskripsi">
                @else
                    @foreach ($appliedJobs as $appliedJob)
                        <div class="ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
                            <div class="flex justify-between gap-2 items-center">
                                @if ($appliedJob->jobPosts->logo)
                                    <img src="{{ asset('storage/' . $appliedJob->jobPosts->logo) }}" alt="Logo"
                                        class="w-48 h-48  object-cover mx-auto mb-4 ">
                                @else
                                    <img class="w-20 h-20  object-cover mb-4 border-2 border-blue-500"
                                        src="https://via.placeholder.com/80" alt="Foto Profil">
                                @endif
                                <div class="">
                                    <dd class="text-xl font-bold ">{{ $appliedJob->jobPosts->pekerjaan }}</dd>
                                    <dd class="text-lg text-blue-500 font-semibold">{{ $appliedJob->jobPosts->perusahaan }}</dd>
                                    <dd class="text-lg font-semibold text-blue-500">{{ $appliedJob->jobPosts->rentangGaji }}</dd>
                                </div>
                                <p class="no-underline text-white font-medium rounded-full text-sm px-2.5 py-2.5 me-2 mb-2
                                    @if ($appliedJob->status === 'accepted')
                                        bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                                    @elseif ($appliedJob->status === 'rejected')
                                        bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800
                                    @else
                                        bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800
                                    @endif
                                    ">
                                    {{ $appliedJob->status }}
                                </p>
                            </div>
                            <div>
                                <div class="flex justify-between space-x-4">
                                    <p class="flex items-center gap-2 py-1.5 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>
                                        Dibuat {{ $appliedJob->jobPosts->created_at->format('d M Y') }}
                                    </p>
                                    <p class="flex items-center gap-2 py-1.5 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                        </svg>
                                        Diperbarui {{ $appliedJob->jobPosts->updated_at->format('d M Y') }}
                                    </p>
                                </div>
              
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
