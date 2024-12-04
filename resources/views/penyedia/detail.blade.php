@extends('penyedia.templates.master')

@section('content')
<dl class="mx-auto max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama pekerjaan</dt>
        <dd class="text-lg font-semibold">{{$pekerjaan->pekerjaan}}</dd>
    </div>
    <div class="flex flex-col py-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Lokasi</dt>
        <dd class="text-lg font-semibold">9{{$pekerjaan->lokasi}}</dd>
    </div>
    <div class="flex flex-col pt-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Type Pekerjaan</dt>
        <dd class="text-lg font-semibold">{{$pekerjaan->typePekerjaan}}</dd>
    </div>
    <div class="flex flex-col pt-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Kontak</dt>
        <dd class="text-lg font-semibold">{{$pekerjaan->kontak}}</dd>
    </div>
    <div class="flex flex-col pt-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Rentang Gaji</dt>
        <dd class="text-lg font-semibold">{{$pekerjaan->rentangGaji}}</dd>
    </div>
    <div class="flex flex-col pt-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Syarat Pekerjaan</dt>
        <dd class="text-lg font-semibold">{{$pekerjaan->syaratPekerjaan}}</dd>
    </div>

</dl>
<div class="mt-6 flex justify-center">
    <a href="{{ url('/penyedia') }}" class="text-gray-900 bg-gray border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" style="background-color: rgb(132, 132, 132); color:white">
        Batal
    </a> 
</div>
@endsection
