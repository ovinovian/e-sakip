<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kegiatan.index', [
            'title' => 'Kegiatan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $collection = DB::table("main4_kegiatans")->get();
        // $programs = DB::table("main3_programs")->get();
        return view('kegiatan.create', [
            'title' => 'Add Kegiatan',
            // 'kegiatans' => $collection,
            // 'programs' => $programs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'kode_kegiatan' => 'required',
            'id_bidang' => 'required',
        ]);

        DB::table("main4_kegiatans")->insert([
            "nama_kegiatan" => $request->nama_kegiatan,
            "kode_kegiatan" => $request->kode_kegiatan,
            "id_program" => $request->id_program
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
        // $collection = DB::table("main4_kegiatans")->where('id', '=', $id)->get();
        // $programs = DB::table("main3_programs")->get();

        return view('kegiatan.edit', [
            'title' => 'Add Kegiatan',
            // 'kegiatans' => $collection,
            // 'programs' => $programs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'kode_kegiatan' => 'required',
            'id_bidang' => 'required',
        ]);

        DB::table("main4_kegiatans")->where('id', '=', $id)->insert([
            "nama_kegiatan" => $request->nama_kegiatan,
            "kode_kegiatan" => $request->kode_kegiatan,
            "id_program" => $request->id_program
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("main4_kegiatans")->where('id', '=', $id)->delete();
    }
}
