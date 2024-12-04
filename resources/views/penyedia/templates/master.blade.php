<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobScout</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @media (max-width: 768px) {
            #hero {
                flex-direction: column-reverse;
            }
            #daftar, #main{
                align-items: center;
            }
            .pekerjaan-detail, #edit{
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <nav class="z-50 bg-blue-700 border-gray-200 dark:bg-gray-900 fixed top-0 w-full">
        <div class="flex justify-between items-center mx-auto max-w-screen-xl p-4">
            <!-- Logo dan Judul -->
            <div class="flex items-center">
                <img src="{{ asset('img/JobScout4.png') }}" class="h-10 rounded-full" alt="JobScout Logo" />
                <span class="ml-3 text-2xl text-white font-semibold dark:text-white">JobScout</span>
            </div>
    
            <!-- Tombol Hamburger (Hanya untuk tampilan mobile) -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
    
            <!-- Link Navigasi Tengah (Tampil di layar besar) -->
            <div class="hidden md:flex space-x-8">
                <div class="relative">
                    <div class="flex gap-2 items-center">
                        <!-- Ikon Rumah -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill text-white" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg>
    
                        <!-- Dropdown Beranda -->
                        <div>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center text-lg text-white font-medium hover:underline">
                                <a href="{{ route('penyedia.index') }}" class="text-white no-underline hove:underline">Beranda</a>
                                <!-- Ikon Dropdown -->
                                <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                        </div>
                    </div>
    
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden absolute mt-2 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="text-sm text-gray-700 dark:text-gray-400">
                            <li>
                                <a href="#hero" class="block px-4 py-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cari Lamaran</a>
                            </li>
                            <li>
                                <a href="#alasan" class="block px-4 py-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kelola Lowongan</a>
                            </li>
                            <li>
                                <a href="#langkah" class="block px-4 py-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dapatkan Kandidat</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="{{route('kelolaLowongan')}}" class="text-lg text-white font-medium no-underline hover:underline">
                    Kelola Lowongan
                </a>
                <a href="{{route('applicants.index2')}}" class="text-lg text-white font-medium no-underline hover:underline">
                    Kelola Pelamar
                </a>
            </div>
    
            <!-- Profil dan Dropdown -->
            <div class="hidden md:flex relative">
                <div class="flex gap-2 items-center">
                    <span class="text-lg text-white font-medium flex items-center hover:underline">
                        {{ Auth::user()->name }}
                    </span>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2" class="text-lg text-white font-medium flex items-center hover:underline">   
                        <!-- Ikon Dropdown -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-circle text-white" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </button>
                </div>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar2" class="z-10 hidden absolute mt-2 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="text-sm text-gray-700 dark:text-gray-400">
                        <li>
                            <button type="button" class="block p-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-bs-toggle="modal" data-bs-target="#profileModal">
                                Lihat Profil
                            </button>    
                        </li>
                        <li>
                            <button id="openModal" class="block p-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="openPasswordModal()">
                                Ganti Password
                            </button>   
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block p-2 no-underline hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden flex flex-col items-start space-y-4 hidden bg-blue-700 text-white p-4">
            <a href="{{ route('penyedia.index') }}" class="no-underline text-lg text-white font-medium hover:underline">Beranda</a>
            <a href="{{route('kelolaLowongan')}}" class="no-underline text-lg text-white font-medium hover:underline">Kelola Lowongan</a>
            <a href="{{route('applicants.index2')}}" class="no-underline text-lg text-white font-medium hover:underline">Kelola Pelamar</a>
            <button type="button" class="no-underline text-lg text-white font-medium hover:underline" data-bs-toggle="modal" data-bs-target="#profileModal">
                Lihat Profil
            </button>    
        
            <button id="openModal" class="no-underline text-lg text-white font-medium hover:underline" onclick="openPasswordModal()">
                Ganti Password
            </button>   
        
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="no-underline text-lg text-white font-medium hover:underline">
                    Log Out
                </button>
            </form>
        </div>
        
        
    </nav>
    
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
    
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    

    <!-- Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 ax-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end">
                        <a href="{{ route('editUserPenyedia', ['id' => Auth::user()->id]) }}" class="no-underline">Edit</a>
                    </div>
                    <div class="flex cols-2">
                        <p class="flex-1 text-gray-500 md:text-lg dark:text-gray-400">Username:</p>
                        <p class="flex-1 text-md font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="flex cols-2">
                        <p class="flex-1 text-gray-500 md:text-lg dark:text-gray-400">Email:</p>
                        <p class="flex-1 text-md font-semibold">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="flex cols-2">
                        <p class="flex-1 text-gray-500 md:text-lg dark:text-gray-400">Role:</p>
                        <p class="flex-1 text-md font-semibold">{{ Auth::user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    {{-- End Navbar --}}

    @include('components2.message')

    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}

    {{-- Footer --}}
    <footer class="z-50 bg-blue-700 fixed w-full bottom-0 left-0 shadow dark:bg-gray-900 mt-4" >    
        <span class="p-3 block text-sm text-white text-center dark:text-white">© 2024 JobScout™. All Rights Reserved.</span>     
    </footer>
    {{-- End Footer --}}


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
    

    
</body>
</html>