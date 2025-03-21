@extends('components.layouts.container')

@section('title', 'Halaman Home')

@section('main')
    <section class="flex items-center gap-10">
        <div class="bg-matcha py-5 px-8">
            <h2 class="text-white font-medium">Pemasukan bulan januari</h2>
            <p class="text-white text-center text-2xl font-bold py-8">Rp3.000.000</p>
        </div>
        <div class="bg-heart py-5 px-8">
            <h2 class="text-white font-medium">Pengeluaran bulan januari</h2>
            <p class="text-white text-center text-2xl font-bold py-8">Rp1.000.000</p>
        </div>
    </section>

    <section class="mt-10">
        <h3 class="text-lg text-black font-bold">Riwayat Pemasukan/Pengeluaran</h3>
        <div class="grid grid-cols-4 gap-6 mt-5">
            <div class="flex items-center justify-center bg-mist p-7 space-y-3">
                <div class="flex flex-col gap-3 items-center justify-center">
                    <div class="bg-[#E5E5E5] rounded-full p-6 aspect-square">
                        <img src="{{ asset('assets/icons/plus.svg') }}" alt="" class="size-6">
                    </div>
                </div>
            </div>
            @for ($i = 0; $i < 5; $i++)
                <div class="bg-mist p-7 space-y-3">
                    <div class="flex flex-col gap-3 items-center justify-center">
                        <div class="bg-[#E5E5E5] rounded-full p-6 aspect-square">
                            <img src="{{ asset('assets/icons/download.svg') }}" alt="" class="size-6">
                        </div>
                        <p class="text-matcha font-medium">+Rp200.000</p>
                        <p>Gaji Bulan Maret</p>
                    </div>
                    <p class="text-xs font-light">28 Maret 2025, pukul 20:00</p>
                </div>
            @endfor
        </div>
    </section>
@endsection