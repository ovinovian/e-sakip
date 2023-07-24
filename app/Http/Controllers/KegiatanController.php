<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $programs = DB::table("main3_programs")->get();
        return view('kegiatan.create', [
            'title' => 'Tambah Kegiatan',
            'programs' => $programs,
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
            'id_program' => 'required',
        ]);

        $created = Carbon::now();

        $save = DB::table("main4_kegiatans")->insert([
            "nama_kegiatan" => $request->nama_kegiatan,
            "kode_kegiatan" => $request->kode_kegiatan,
            "id_program" => $request->id_program,
            "created_at" => $created,
            "updated_at" => $created
        ]);

        if ($save) {
            return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil disimpan');
        } else {
            return redirect()->route('kegiatan.index')->with('error', 'Data gagal disimpan');
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
        $collection = DB::table("main4_kegiatans")->where('id', '=', $id)->first();
        $programs = DB::table("main3_programs")->get();

        $current_program = DB::table("main3_programs")
                ->where('id', '=', $collection->id_program)
                ->select('main3_programs.id', 'main3_programs.nama_program')
                ->first();

        return view('kegiatan.edit', [
            'title' => 'Add Kegiatan',
            'kegiatan' => $collection,
            'programs' => $programs,
            'current_program' => $current_program,
            'id' => $id,
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
            'id_program' => 'required',
        ]);

        $created = Carbon::now();

        $update = DB::table("main4_kegiatans")->where('id', '=', $id)->update([
            "nama_kegiatan" => $request->nama_kegiatan,
            "kode_kegiatan" => $request->kode_kegiatan,
            "id_program" => $request->id_program,
            "updated_at" => $created
        ]);

        if ($update) {
            return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil disimpan');
        } else {
            return redirect()->route('kegiatan.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("main4_kegiatans")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('kegiatan.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('kegiatan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
