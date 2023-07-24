<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $kegiatans = DB::table("main4_kegiatans")->get();
        return view('subkegiatan.create', [
            'title' => 'Add Sub Kegiatan',
            'kegiatans' => $kegiatans,
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

        $created = Carbon::now();

        $save = DB::table("main5_subkegiatans")->insert([
            "nama_subkegiatan" => $request->nama_subkegiatan,
            "kode_subkegiatan" => $request->kode_subkegiatan,
            "id_kegiatan" => $request->id_kegiatan,
            "created_at" => $created,
            "updated_at" => $created
        ]);

        if ($save) {
            return redirect()->route('subkegiatan.index')->with('success', 'Data sub kegiatan berhasil disimpan');
        } else {
            return redirect()->route('subkegiatan.index')->with('error', 'Data gagal disimpan');
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
        $collection = DB::table("main5_subkegiatans")->where('id', '=', $id)->first();
        
        $kegiatans = DB::table("main4_kegiatans")->get();
        $current_kegiatan= DB::table("main4_kegiatans")
                ->where('id', '=', $collection->id_kegiatan)
                ->select('main4_kegiatans.id', 'main4_kegiatans.nama_kegiatan')
                ->first();

        return view('subkegiatan.edit', [
            'title' => 'Edit Sub Kegiatan',
            'subkegiatan' => $collection,
            'kegiatans' => $kegiatans,
            'current_kegiatan' => $current_kegiatan,
            'id' => $id,
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
            'id_kegiatan' => 'required',
        ]);

        $created = Carbon::now();

        $update = DB::table("main5_subkegiatans")->where('id', '=', $id)->update([
            "nama_subkegiatan" => $request->nama_subkegiatan,
            "kode_subkegiatan" => $request->kode_subkegiatan,
            "id_kegiatan" => $request->id_kegiatan,
            "updated_at" => $created
        ]);

        if ($update) {
            return redirect()->route('subkegiatan.index')->with('success', 'Data sub kegiatan berhasil disimpan');
        } else {
            return redirect()->route('subkegiatan.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("main5_subkegiatans")->where('id', '=', $id)->delete();

        if ($delete) {
            return redirect()->route('subkegiatan.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('subkegiatan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
