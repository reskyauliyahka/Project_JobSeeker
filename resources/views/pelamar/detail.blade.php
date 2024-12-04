@extends('pelamar.templates.master')


@section('content')
<div id="profil" class="w-1/2 mx-auto py-10 p-6 bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="margin-top: 100px; margin-bottom:70px">
    <!-- Container -->
    <div class="grid grid-cols-12 gap-6 " >
        <!-- Main Content -->
        <div class="col-span-9 bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-12 gap-4">
                <!-- Profile Overview -->
                <div class="col-span-12 md:col-span-4 text-center">
                    <div class="flex justify-end">
                        <button id="openModal" class="text-blue-500" onclick="openPasswordModal()">Ganti Password</button>
                    </div>
                    @if ($profile->foto_profil)
                        <img src="{{ asset('storage/' . $profile->foto_profil) }}" 
                            alt="Foto Profil" 
                            class="w-48 h-48  object-cover mx-auto rounded-full border-2 border-blue-500">
                    @else
                        <img class="w-48 h-48  object-cover mx-auto rounded-full border-2 border-blue-500"
                        src="https://via.placeholder.com/80" alt="Foto Profil">
                    @endif
                    <h1 class="text-lg font-bold mt-4">{{Auth::user()->name}}</h1>
                    <p class="text-gray-500 text-sm">Last update: {{Auth::user()->updated_at->format('d M Y')}}</p>
                    <a href="{{ route('editUser', ['id' => Auth::user()->id]) }}" class="no-underline text-white bg-blue-200 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Edit
                    </a>
                </div>

                <!-- Progress and Details -->
                <div class="col-span-12 md:col-span-8 ax-w-xs p-6 bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold">Pelamar</h3>
                        <h3 class="text-center text-lg font-semibold">
                            Medium 
                            <span class="block text-base">Syarat untuk bisa lamar lowongan</span>
                        </h3>
                        <h3 class="text-lg font-semibold">Profesional</h3>    
                    </div>
                    <div>
                        <div class="bg-blue-700 h-5 mt-3 rounded-lg"></div>
                    </div>
    
                    <div class="flex justify-between mt-4">
                        <h3 class="block text-base">Isi profile dan siapkan CV Anda.</h3>
                    </div>

                </div>

                <!-- Biodata Section -->
                <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800">Biodata Diri</h2>
                    <div class="mt-4 p-4 bg-blue-100 rounded-lg shadow-inner">
                        <div class="flex justify-between">
                            <div class="flex flex-col md:flex-row gap-12">
                                @if ($profile->foto_profil)
                                    <img src="{{ asset('storage/' . $profile->foto_profil) }}" 
                                        alt="Foto Profil" 
                                        class="w-48 h-48 rounded-full object-cover">
                                @else
                                    <p>Tidak ada foto</p>
                                @endif

                                <div class="mt-4 items-center">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama</dt>
                                    <dd class="text-sm font-semibold">{{$profile->nama}}</dd>
                                    
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Kontak</dt>
                                    <dd class="text-sm font-semibold">{{$profile->kontak}}</dd>
                                    <!-- <p class="text-gray-500 text-sm">0895330153087</p> -->
                                </div>
                            </div>
                            
                            <div>
                                <a href="{{ url("/pelamar/$profile->pelamar_id/edit") }}" 
                                    class="no-underline">
                                    Edit
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-700">
                            <div class="flex space-x-4 mt-4">
                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">No. Hp</dt>
                                    <dd class="text-sm font-semibold">{{$profile->noHp}}</dd>
                                </div>

                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Alamat</dt>
                                    <dd class="text-sm font-semibold">{{$profile->alamat}}</dd>
                                </div>

                            </div>

                            <div class="flex space-x-4 mt-4">
                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tanggal Lahir</dt>
                                    <dd class="text-sm font-semibold">{{$profile->tglLahir}}</dd>
                                </div>

                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Umur</dt>
                                    <dd class="text-sm font-semibold">{{$profile->umur}}</dd>
                                </div>

                            </div>

                            <div class="flex space-x-4 mt-4">
                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenis Kelamin</dt>
                                    <dd class="text-sm font-semibold">{{$profile->jenis_kelamin}}</dd>
                                </div>

                                <div class="flex-1">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenjang Pendidikan</dt>
                                    <dd class="text-sm font-semibold">{{$profile->jenjang}}</dd>
                                </div>
                            </div>

                            <div rows="6" class="mt-4">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Ringkasan Diri</dt>
                                <dd class="text-sm font-semibold">
                                    <ul class="max-w-md space-y-1 list-disc list-inside dark:text-gray-400" style="list-style-position: outside; padding-left: 1.5rem;">
                                        @foreach(explode(PHP_EOL, $profile->deskripsi) as $deskripsi)
                                            <li>{{ trim($deskripsi) }}</li>
                                        @endforeach
                                    </ul>
                                </dd>
                            </div>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div id="passwordModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-blue-100 p-6 rounded-lg shadow-lg w-96">
        <div class="flex justify-end">
            <button id="closeModal" class="text-right text-gray-600 font-bold text-lg" onclick="closePasswordModal()">X</button>
        </div>
        <h3 class="text-xl font-semibold mb-4 text-center">Ganti Kata Sandi</h3>
        
        <!-- Password change form -->
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">{{ __('Kata Sandi Saat Ini') }}</label>
                <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-lg" autocomplete="current-password" />
                @if ($errors->updatePassword->has('current_password'))
                    <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('current_password') }}</p>
                @endif
            </div>
            
            <div>
                <label for="update_password_password" class="block text-sm font-medium text-gray-700">{{ __('Kata Sandi Baru') }}</label>
                <input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-lg" autocomplete="new-password" />
                @if ($errors->updatePassword->has('password'))
                    <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password') }}</p>
                @endif
            </div>
            
            <div>
                <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Konfirmasi Kata Sandi') }}</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-lg" autocomplete="new-password" />
                @if ($errors->updatePassword->has('password_confirmation'))
                    <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password_confirmation') }}</p>
                @endif
            </div>
            
            <div class="flex justify-center items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">{{ __('Simpan') }}</button>
            
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>            
        </form>
    </div>
</div>
<script>
    // Function to open the modal
    function openPasswordModal() {
        document.getElementById('passwordModal').classList.remove('hidden');
    }

    // Function to close the modal
    function closePasswordModal() {
        document.getElementById('passwordModal').classList.add('hidden');
    }

    // Optional: Close modal when clicking outside of it
    window.onclick = function (event) {
        if (event.target === document.getElementById('passwordModal')) {
            document.getElementById('passwordModal').classList.add('hidden');
        }
    };
</script>
@endsection


