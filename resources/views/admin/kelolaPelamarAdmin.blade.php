@extends('admin.templates.master')

@section('content')
    {{-- Menu --}}
    <div style="margin-top: 110px; margin-bottom:80px">
        {{-- Container Daftar dan Index --}}
        <div id="main" class="flex flex-col md:flex-row w-full justify-center">
            <!-- Statistik di Tengah -->
            <div>
                <div class="mx-4 space-y-6 mb-3">
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Total Pelamar</dt>
                        <dd class="text-center text-md font-semibold">{{ $totalLowongan }}</dd>
                    </div>
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Diterima</dt>
                        <dd class="text-center text-md font-semibold">{{ $lowonganDiterima }}</dd>
                    </div>
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Ditolak</dt>
                        <dd class="text-center text-md font-semibold">{{ $lowonganDitolak }}</dd>
                    </div>
                </div>
            </div>

            <div>
                <div id="daftar" class="w-1/3 flex flex-col" style="overflow-y: auto;max-height: 430px;min-height: 300px;">
                    @foreach ($daftarpekerjaan as $pekerjaan2)
                        <div
                            class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-2">
                            <div class="flex gap-6 items-center">
                                @if ($pekerjaan2->logo)
                                    <img src="{{ asset('storage/' . $pekerjaan2->logo) }}" alt="Logo"
                                        class="w-20 h-20  object-cover mx-auto mb-4">
                                @else
                                    <img class="w-20 h-20  object-cover mb-4"
                                        src="https://via.placeholder.com/80" alt="Foto Profil">
                                @endif
                                <div>
                                    <h5 class="my-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $pekerjaan2->pekerjaan }}
                                    </h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $pekerjaan2->perusahaan }}
                                    </p>
                                </div>
                            </div>
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
                            <button
                                class="mt-3 w-full flex justify-center text-white bg-blue-700 no-underline hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                onclick="toggleApplicants({{ $pekerjaan2->id }})">
                                Lihat Pelamar
                            </button>
                        </div>
                    @endforeach
                </div>
                
                <!-- Navigasi Pagination -->
                @if ($daftarpekerjaan->isNotEmpty())
                    <div class="mt-3 me-4 flex justify-center">
                        {{ $daftarpekerjaan->links('pagi') }}
                    </div>
                @endif

            </div>

            {{-- End Daftar Pekerjaan --}}

            <div class="mx-4" style="overflow-y: auto;max-height: 500px;min-height: 300px; ">
                @if ($daftarpekerjaan->isNotEmpty())
                    {{-- Iterasi setiap pekerjaan --}}
                    @foreach ($daftarpekerjaan as $pekerjaan2)
                        <div id="pelamar-{{ $pekerjaan2->id }}" class="hidden"
                            style="overflow-y: auto; max-height: 500px; min-height: 300px;">
                            @php
                                $pelamarPekerjaan = $applicants->where('pekerjaan_id', $pekerjaan2->id);
                            @endphp

                            @foreach ($pelamarPekerjaan as $applicant)
                                <div
                                    class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
                                    @if ($applicant->user && $applicant->user->profile)
                                        <div class="flex gap-6 ">
                                            @if($applicant->user->profile->foto_profil)
                                                {{-- Foto Profil Pelamar --}}
                                                <img src="{{ asset('storage/' . $applicant->user->profile->foto_profil) }}"
                                                    alt="Foto Profil" class="w-24 h-24 object-cover rounded-full">
                                                </img>
                                            @else
                                                <img class="w-24 h-24 object-cover rounded-full mb-4 border-2 border-blue-500"
                                                src="https://via.placeholder.com/80" alt="Foto Profil">
                                            @endif
                                            {{-- Informasi Pelamar --}}
                                            <div>
                                                <p class="text-xl font-bold">{{ $applicant->user->profile->nama }}</p>
                                                <p class="text-lg text-blue-500 font-semibold">
                                                    {{ $applicant->user->profile->umur }} Tahun</p>
                                                <p class="text-lg font-semibold">Pendidikan:
                                                    {{ $applicant->user->profile->jenjang }}</p>
                                            </div>
                                            <div>
                                                <a href="{{ asset('storage/' . $applicant->resume_file) }}"
                                                    class="bg-blue-100 rounded-lg p-2 text-md no-underline text-gray-500 font-semibold hover:bg-blue-200">
                                                    Lihat CV
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- Tombol --}}
                                        <div class="flex justify-center">
                                            <a href="javascript:void(0);"
                                                class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                onclick="toggleApplicantProfil({{ $applicant->id }})">
                                                Data lainnya
                                            </a>
                                            {{-- Button Aksi --}}
                                            <a href="javascript:void(0);"
                                                class="no-underline focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                                onclick="handleActionClick({{ $applicant->id }}, '{{ $applicant->status }}')">
                                                Buat Aksi
                                            </a>



                                            {{-- Modal untuk memilih status (Terima atau Tolak) --}}
                                            <div class="modal fade" id="actionModal-{{ $applicant->id }}" tabindex="-1"
                                                aria-labelledby="actionModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="actionModalLabel">Pilih Aksi untuk
                                                                Pelamar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- Form Update Status --}}
                                                            <form
                                                                action="{{ route('applicant.updateStatus', $applicant->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{-- Tombol Terima --}}
                                                                <button type="submit" name="status" value="accepted"
                                                                    class="btn btn-success w-100 mb-2">Terima</button>
                                                                {{-- Tombol Tolak --}}
                                                                <button type="submit" name="status" value="rejected"
                                                                    class="btn btn-danger w-100">Tolak</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- Lihat Profil --}}
                                        <div id="profil-{{ $applicant->id }}"
                                            class="hidden mt-2 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <div class="grid grid-cols-2 mt-4">
                                                <div class="flex-1">
                                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">No. Hp</dt>
                                                    <dd class="text-sm font-semibold">{{ $applicant->user->profile->noHp }}
                                                    </dd>
                                                </div>
                                                <div class="flex-1">
                                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                                                    <dd class="text-sm font-semibold">
                                                        {{ $applicant->user->profile->kontak }}
                                                    </dd>
                                                </div>

                                            </div>
                                            <div class="grid grid-cols-2 mt-4">
                                                <div class="flex-1">
                                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenis
                                                        Kelamin
                                                    </dt>
                                                    <dd class="text-sm font-semibold">
                                                        {{ $applicant->user->profile->jenis_kelamin }}</dd>
                                                </div>
                                                <div class="flex-1">
                                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tanggal
                                                        Lahir
                                                    </dt>
                                                    <dd class="text-sm font-semibold">
                                                        {{ $applicant->user->profile->tglLahir }}
                                                    </dd>
                                                </div>

                                            </div>
                                            <div class="mt-4">
                                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Alamat</dt>
                                                <dd class="text-sm font-semibold">{{ $applicant->user->profile->alamat }}
                                                </dd>
                                            </div>
                                            <div class="mt-4">
                                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Ringkasan Diri</dt>
                                                <dd class="text-sm font-semibold">
                                                    <ul class="max-w-md space-y-1 list-disc list-inside dark:text-gray-400" style="list-style-position: outside; padding-left: 1.5rem;">
                                                        @foreach(explode(PHP_EOL, $applicant->user->profile->deskripsi) as $deskripsi)
                                                            <li>{{ trim($deskripsi) }}</li>
                                                        @endforeach
                                                    </ul>
                                                </dd>
                                            </div>
                                        </div>
                                        {{-- End Lihat profil --}}
                                    @else
                                        <p>Profil tidak tersedia</p>
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    @endforeach

            </div>
            {{-- Pesan default jika pekerjaan belum dipilih --}}
            <div id="defaultMessage"
                class="default-message max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-auto">
                <p class="text-center"><em>Pilih pekerjaan terlebih dahulu untuk melihat pelamar.</em></p>
                <img class="max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}"
                    alt="Gambar Deskripsi">
            </div>
        @else
            <div class="">
                {{-- Jika belum ada pelamar --}}
                <p class="text-center"><em>Belum ada pelamar untuk pekerjaan ini.</em></p>
                <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/img5.png') }}"
                    alt="Gambar Deskripsi">
            </div>
            @endif

        </div>

    </div>

    <script>
        function toggleApplicants(pekerjaanId) {
             // Sembunyikan semua elemen pelamar
            const allApplicants = document.querySelectorAll('[id^="pelamar-"]');
            allApplicants.forEach((element) => {
                element.classList.add('hidden');
            });

            // Sembunyikan pesan default jika pekerjaan dipilih
            const defaultMessage = document.getElementById('defaultMessage');
            defaultMessage.classList.add('hidden');

            // Tampilkan elemen pelamar yang sesuai
            const selectedElement = document.getElementById(`pelamar-${pekerjaanId}`);
            if (selectedElement) {
                selectedElement.classList.remove('hidden');
            }
        }

        function toggleApplicantProfil(profilId) {
            const element = document.getElementById(`profil-${profilId}`);
            // element.classList.add('hidden');

            // Toggle visibilitas div pelamar
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }

        function toggleActionForm(applicantId) {
            const actionForm = document.getElementById(`action-form-${applicantId}`);

            // Toggle visibility of the action form
            if (actionForm.classList.contains('hidden')) {
                actionForm.classList.remove('hidden');
            } else {
                actionForm.classList.add('hidden');
            }

        }
   
        function showActionModal(applicantId) {
            // Tampilkan modal berdasarkan ID pelamar
            const modal = new bootstrap.Modal(document.getElementById(`actionModal-${applicantId}`));
            modal.show();
        }

        function handleActionClick(applicantId, status) {
            if (status === 'accepted') {
                // Tampilkan modal konfirmasi
                const confirmation = confirm("Anda sudah menerima pelamar, apakah ingin mengubah status?");
                if (confirmation) {
                    // Tampilkan modal aksi
                    showActionModal(applicantId);
                }
            } else if (status === 'rejected') {
                const confirmation = confirm("Anda sudah menolak pelamar, apakah ingin mengubah status?");
                if (confirmation) {
                    // Tampilkan modal aksi
                    showActionModal(applicantId);
                }
            }
            else {
                // Langsung tampilkan modal aksi
                showActionModal(applicantId);
            }
        }
    </script>

@endsection
