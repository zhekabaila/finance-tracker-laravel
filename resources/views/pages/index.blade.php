@extends('components.layouts.container')

@section('title', 'Halaman Home')

@section('main')
    <section class="flex items-center gap-10">
        <div class="bg-matcha py-5 px-8">
            <h2 class="text-white font-medium">Total Pemasukan</h2>
            <p class="text-white text-center text-2xl font-bold py-8">{{ formatRupiah($total_pemasukan) }}</p>
        </div>
        <div class="bg-heart py-5 px-8">
            <h2 class="text-white font-medium">Total Pengeluaran</h2>
            <p class="text-white text-center text-2xl font-bold py-8">{{ formatRupiah($total_pengeluaran) }}</p>
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
            @php
                function formatRupiah($jumlah) {
                    return 'Rp' . number_format($jumlah, 0, ',', '.');
                }
                
                function getIcon($jenis) {
                    if ($jenis == 'pemasukan') {
                        return asset('assets/icons/download.svg');
                    } else {
                        return asset('assets/icons/upload.svg');
                    }
                }

                $color = [
                    'pemasukan' => 'text-matcha',
                    'pengeluaran' => 'text-heart'
                ];
            @endphp
            @foreach ($transaksi as $item)
                <div class="bg-mist p-7 space-y-3">
                    <div class="flex flex-col gap-3 items-center justify-center">
                        <div class="bg-[#E5E5E5] rounded-full p-6 aspect-square">
                            <img src="{{ getIcon($item->jenis) }}" alt="" class="size-6">
                        </div>
                        <p class="{{ $color[$item->jenis] }} font-medium">{{ formatRupiah($item->jumlah) }}</p>
                        <p>{{ $item->keterangan }}</p>
                    </div>
                    <p class="text-xs font-light">{{ Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection