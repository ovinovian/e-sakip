<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bidang.index', [
            'title' => 'bidang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $urusans = DB::table("main1_urusans")->get();
        return view('bidang.create', [
            'title' => 'Tambah Bidang',
            'urusans' => $urusans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_bidang' => 'required',
            'kode_bidang' => 'required',
            'id_urusan' => 'required',
        ],
        [
            'id_urusan.required' => 'The urusan required'
        ]
        );

        $created = Carbon::now();

        $save =  DB::table("main2_bidangs")->insert([
            "nama_bidang" => $request->nama_bidang,
            "kode_bidang" => $request->kode_bidang,
            "id_urusan" => $request->id_urusan,
            "created_at" => $created,
            "updated_at" => $created
        ]);

        if ($save) {
            return redirect()->route('bidang.index')->with('success', 'Data Bidang berhasil disimpan');
        } else {
            return redirect()->route('bidang.index')->with('error', 'Data gagal disimpan');
        }


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
        $collection = DB::table("main2_bidangs") ->where('id', '=', $id)->first();
        $urusans = DB::table("main1_urusans")->get();

        $current_urusan = DB::table("main1_urusans")
                ->where('id', '=', $collection->id_urusan)
                ->select('main1_urusans.id', 'main1_urusans.nama_urusan')
                ->first();


        return view('bidang.edit', [
            'title' => 'Edit Urusan',
            'bidang' => $collection,
            'urusans' => $urusans,
            'current_urusan' => $current_urusan,
            'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_bidang' => 'required',
            'kode_bidang' => 'required',
            'id_urusan' => 'required',
        ]);

        $created = Carbon::now();

        $update = DB::table("main2_bidangs")->where('id', '=', $id)->update([
            "nama_bidang" => $request->nama_bidang,
            "kode_bidang" => $request->kode_bidang,
            "id_urusan" => $request->id_urusan,
            "updated_at" => $created
        ]);

        if ($update) {
            return redirect()->route('bidang.index')->with('success', 'Data bidang berhasil disimpan');
        } else {
            return redirect()->route('bidang.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("main2_bidangs")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('bidang.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('bidang.index')->with('error', 'Data gagal dihapus');
        }
    }
}
