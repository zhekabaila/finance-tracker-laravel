<nav class="fixed top-0 left-0 right-0">
    <div class="flex items-center justify-between bg-white px-28 py-5">
        {{-- BAGIAN KIRI --}}
        <h1 class="text-primary text-2xl font-semibold">Finance Tracker</h1>
        {{-- BAGIAN KIRI --}}

        {{-- BAGIAN KANAN --}}
        <ul class="flex items-center gap-x-6">
            <li>
                <a href="{{ route('home') }}" class="text-black font-bold text-sm">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="text-black font-bold text-sm">Data Transaksi</a>
            </li>
            <li>
                <a href="{{ route('create') }}" class="text-black font-bold text-sm">Tambah</a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="text-black font-bold text-sm">Profile</a>
            </li>
        </ul>
        {{-- BAGIAN KANAN --}}
    </div>
</nav>