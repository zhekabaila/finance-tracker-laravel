<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiRequest;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        $total_pemasukan = Transaksi::where('jenis', 'pemasukan')->sum('jumlah');
        $total_pengeluaran = Transaksi::where('jenis', 'pengeluaran')->sum('jumlah');

        return view('pages.index', [
            'transaksi' => $transaksi,
            'total_pemasukan' => $total_pemasukan,
            'total_pengeluaran' => $total_pengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTransaksiRequest $request)
    {
        Transaksi::create([
            'jumlah' => $request->validated('jumlah'),
            'keterangan' => $request->validated('keterangan'),
            'jenis' => $request->validated('jenis'),
            'user_id' => '9e7fb451-5cfe-432f-ac76-ccf2039f40b9',
            // 'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
