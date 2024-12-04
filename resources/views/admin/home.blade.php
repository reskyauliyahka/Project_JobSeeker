@extends('admin.templates.master')

@section('content')
    <div id="hero" class="flex flex-col md:flex-row justify-center bg-blue-100" style="margin-top: 80px;">
        <div class="flex justify-center items-center flex-col ">
            <h1 class="text-2xl font-bold ">Selamat Datang,  {{ Auth::user()->name }}</h1>
            <div class="deskripsi text-center" style="width: 70%">
                <h6>Kelola platform JobScout™ dengan mudah, efisien, dan terintegrasi.</h6>
            </div>
            <a href="{{route('admin-kelolaPengguna')}}"
                class="no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Kelola Pengguna
            </a>
        </div>
        <div>
            <img class="h-auto max-w-full mx-auto rounded-lg" src="{{ asset('img/bgUtama.png') }}" alt="">
        </div>
    </div>


    <div id="kelola" class="mt-4">
        <h3 class="text-xl text-center font-bold">Kelola Sistem dengan Mudah</h3>
        <div id="kelola2" class="flex flex-col md:flex-row justify-center gap-8">

            <div
                class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{route('admin-kelolaPengguna')}}">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img3.png') }}" alt="" />
                </a>
                <div class="text-center">
                    <a href="{{route('admin-kelolaPengguna')}}">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Pengguna</h4>
                    </a>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Kelola akun pengguna platform,
                        baik penyedia pekerjaan maupun pelamar</p>
                </div>
            </div>
            <div
                class="mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{route('admin-kelolaLowongan')}}">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img2.png') }}" alt="" />
                </a>
                <div class="text-center">
                    <a href="{{route('admin-kelolaLowongan')}}">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Lowongan</h4>
                    </a>
                    <p class="w-1/2 mx-auto font-normal text-gray-700 dark:text-gray-400">Tambahkan, edit, atau hapus
                        lowongan pekerjaan yang terdaftar di platform</p>
                </div>
            </div>
            <div
                class=" mt-4 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{route('admin-kelolaPelamar')}}">
                    <img class="rounded-t-lg w-1/2 mx-auto" src="{{ asset('img/img4.png') }}" alt="" />
                </a>
                <div class="text-center">
                    <a href="{{route('admin-kelolaPelamar')}}">
                        <h4 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Kelola Pelamar</h4>
                    </a>
                    <p class="w-1/2 mx-auto text-gray-700 dark:text-gray-400">Lihat dan kelola status lamaran yang masuk
                        dengan efisien</p>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-4" id="analisis" style="margin-bottom: 80px;">
        <h1 class="text-2xl text-center font-bold">Analisis Data dan Statistik</h1>
        <div
            class="mx-5 max-w-full p-6 bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col md:flex-row gap-4 justify-center p-3">
                <div
                    class="flex-1 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div style="margin:auto;">
                        <canvas id="roleChart"></canvas>
                    </div>
                </div>

                <div
                    class="flex-1 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div style="width: 50%; margin:auto;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

            </div>
            <div class="flex flex-col md:flex-row gap-4 justify-center p-3">
                <div
                    class="flex-1 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div style="margin:auto;">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
                <div
                    class="flex-1 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div style="margin:auto">
                        <canvas id="ratingChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        async function loadChartData() {
            try {
                // Mengambil data dari endpoint
                const response = await fetch('/user-roles-data');
                const data = await response.json();

                // Memisahkan label dan jumlah dari hasil data
                const labels = data.map(item => item.role.charAt(0).toUpperCase() + item.role.slice(1));
                const totals = data.map(item => item.total);

                // Membuat grafik
                const ctx = document.getElementById('roleChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels, 
                        datasets: [{
                            label: 'Jumlah Pengguna',
                            data: totals,
                            backgroundColor: ['orange', 'blue'], 
                            borderColor: ['darkorange', 'darkblue'], 
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Distribusi Jumlah Pengguna Berdasarkan Role'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true 
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Gagal memuat data:', error);
            }
        }

        
        loadChartData();

        async function loadCategoryData() {
            try {
                // Mengambil data dari endpoint
                const response = await fetch('/job-category-data');
                const data = await response.json();

                // Debugging: Periksa data di konsol
                console.log(data);

                // Pisahkan label kategori pekerjaan dan total
                const labels = data.map(item => item.pekerjaan);
                const totals = data.map(item => item.total);

                // Membuat grafik
                const ctx = document.getElementById('categoryChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels, 
                        datasets: [{
                            label: 'Jumlah Pekerjaan Diupload',
                            data: totals, 
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', 
                            borderColor: 'rgba(54, 162, 235, 1)', 
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Kategori Pekerjaan yang Paling Banyak Diupload'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true 
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Gagal memuat data:', error);
            }
        }

        loadCategoryData();

        async function loadStatusData() {
            try {
                // Mengambil data dari endpoint
                const response = await fetch('/applicant-status-data');
                const data = await response.json();

                // Debugging: Periksa data di konsol
                console.log(data);

                // Pisahkan label status lamaran dan total
                const labels = data.map(item => item.status.charAt(0).toUpperCase() + item.status.slice(1));
                const totals = data.map(item => item.total);

                // Membuat grafik
                const ctx = document.getElementById('statusChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie', 
                    data: {
                        labels: labels, 
                        datasets: [{
                            label: 'Jumlah Pelamar Berdasarkan Status',
                            data: totals, 
                            backgroundColor: ['#4caf50', '#f44336',
                            '#ffeb3b'], 
                            borderColor: ['#388e3c', '#d32f2f', '#fbc02d'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Pelamar Berdasarkan Status'
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Gagal memuat data:', error);
            }
        }

        loadStatusData();

        async function loadRatingData() {
            try {
                // Mengambil data dari endpoint
                const response = await fetch('/job-rating-data');
                const data = await response.json();

                // Debugging: Periksa data di konsol
                console.log(data);

                
                const labels = data.map(item => item.pekerjaan);
                const averages = data.map(item => item.average_rating);

                // Membuat grafik
                const ctx = document.getElementById('ratingChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar', 
                    data: {
                        labels: labels, 
                        datasets: [{
                            label: 'Rating Pekerjaan',
                            data: averages, 
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', 
                            borderColor: 'rgba(54, 162, 235, 1)', 
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Rating Pekerjaan'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true 
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Gagal memuat data:', error);
            }
        }

        loadRatingData();
    </script>
@endsection
