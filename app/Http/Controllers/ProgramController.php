<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('program.index', [
            'title' => 'Program'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = DB::table("main2_bidangs")->get();
        return view('program.create', [
            'title' => 'Tambah Program',
            'bidangs' => $bidangs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_program' => 'required',
            'kode_program' => 'required',
            'id_bidang' => 'required',
        ]);

        $created = Carbon::now();

        $save = DB::table("main3_programs")->insert([
            "nama_program" => $request->nama_program,
            "kode_program" => $request->kode_program,
            "id_bidang" => $request->id_bidang,
            "created_at" => $created,
            "updated_at" => $created
        ]);

        if ($save) {
            return redirect()->route('program.index')->with('success', 'Data program berhasil disimpan');
        } else {
            return redirect()->route('program.index')->with('error', 'Data gagal disimpan');
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
        $collection = DB::table("main3_programs")->where('id', '=', $id)->first();

        $bidangs = DB::table("main2_bidangs")->get();
        $current_bidang = DB::table("main2_bidangs")
                ->where('id', '=', $collection->id_bidang)
                ->select('main2_bidangs.id', 'main2_bidangs.nama_bidang')
                ->first();

        return view('program.edit', [
            'title' => 'Edit Urusan',
            'programs' => $collection,
            'bidangs' => $bidangs,
            'current_bidang' => $current_bidang,
            'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_program' => 'required',
            'kode_program' => 'required',
            'id_bidang' => 'required',
        ]);

        $created = Carbon::now();

        $update = DB::table("main3_programs")->where('id', '=', $id)->update([
            "nama_program" => $request->nama_program,
            "kode_program" => $request->kode_program,
            "id_bidang" => $request->id_bidang,
            "updated_at" => $created
        ]);

        if ($update) {
            return redirect()->route('program.index')->with('success', 'Data program berhasil disimpan');
        } else {
            return redirect()->route('program.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("main3_programs")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('program.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('program.index')->with('error', 'Data gagal dihapus');
        }
    }
}
