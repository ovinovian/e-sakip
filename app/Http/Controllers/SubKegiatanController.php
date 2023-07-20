<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subkegiatan.index', [
            'title' => 'Sub Kegiatan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $collection = DB::table("main5_subkegiatans")->get();
        // $kegiatans = DB::table("main4_kegiatans")->get();
        return view('subkegiatan.create', [
            'title' => 'Add Sub Kegiatan',
            // 'subkegiatans' => $collection,
            // 'kegiatans' => $kegiatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_subkegiatan' => 'required',
            'kode_subkegiatan' => 'required',
            'id_kegiatan' => 'required',
        ]);

        DB::table("main5_subkegiatans")->insert([
            "nama_subkegiatan" => $request->nama_subkegiatan,
            "kode_subkegiatan" => $request->kode_subkegiatan,
            "id_kegiatan" => $request->id_kegiatan
        ]);
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
        // $collection = DB::table("main5_subkegiatans")->where('id', '=', $id)->get();
        // $kegiatans = DB::table("main4_kegiatans")->get();

        return view('subkegiatan.edit', [
            'title' => 'Edit Sub Kegiatan',
            // 'subkegiatans' => $collection,
            // 'kegiatans' => $kegiatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_subkegiatan' => 'required',
            'kode_subkegiatan' => 'required',
            'id_bidang' => 'required',
        ]);

        DB::table("main5_subkegiatans")->where('id', '=', $id)->insert([
            "nama_subkegiatan" => $request->nama_subkegiatan,
            "kode_subkegiatan" => $request->kode_subkegiatan,
            "id_kegiatan" => $request->id_kegiatan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("main5_subkegiatans")->where('id', '=', $id)->delete();
    }
}
