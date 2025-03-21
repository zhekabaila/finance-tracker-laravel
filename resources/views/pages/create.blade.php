@extends('components.layouts.container')

@section('title', 'Create Page')

@section('main')
    <form action="{{ route('store') }}" method="post" class="bg-white rounded-md p-8 w-1/2 space-y-4">
        @csrf
        @method('POST')

        <h2 class="text-black font-bold text-xl pb-5">Tambah Transaksi</h2>

        <div class="flex flex-col gap-1">
            <label for="jumlah" class="text-black font-semibold">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="bg-white border border-primary rounded-md px-2 py-1.5">
            @error('jumlah') <p class="text-xs font-light text-heart">{{ $message }}</p> @enderror
        </div>
        <div class="flex flex-col gap-1">
            <label for="keterangan" class="text-black font-semibold">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="bg-white border border-primary rounded-md px-2 py-1.5">
            @error('keterangan') <p class="text-xs font-light text-heart">{{ $message }}</p> @enderror
        </div>
        <div class="flex flex-col gap-1">
            <label for="jenis" class="text-black font-semibold">Jenis</label>
            <select name="jenis" id="jenis" class="bg-white border border-primary rounded-md px-2 py-1.5">
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
            @error('jenis') <p class="text-xs font-light text-heart">{{ $message }}</p> @enderror
        </div>
        <div class="py-6">
            <button type="submit" class="bg-primary text-white font-semibold rounded-md px-4 py-1.5">Tambah</button>
        </div>
    </form>
@endsection