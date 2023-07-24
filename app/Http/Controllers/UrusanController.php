<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('urusan.index', [
            'title' => 'Urusan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urusan.create', [
            'title' => 'Tambah Urusan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_urusan' => 'required',
            'kode_urusan' => 'required',
        ]);

        $created = Carbon::now();

        $save = DB::table("main1_urusans")->insert([
            "nama_urusan" => $request->nama_urusan,
            "kode_urusan" => $request->kode_urusan,
            "created_at" => $created,
            "updated_at" => $created
        ]);

        if ($save) {
            return redirect()->route('urusan.index')->with('success', 'Data urusan berhasil disimpan');
        } else {
            return redirect()->route('urusan.index')->with('error', 'Data gagal disimpan');
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
        $collection = DB::table("main1_urusans")->where('id', '=', $id)->first();
        
        return view('urusan.edit', [
            'title' => 'Add Urusan',
            'urusans' => $collection,
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_urusan' => 'required',
            'kode_urusan' => 'required',
        ]);

        $created = Carbon::now();

        $update = DB::table("main1_urusans")->where('id', '=', $id)->update([
            "nama_urusan" => $request->nama_urusan,
            "kode_urusan" => $request->kode_urusan,
            "updated_at" => $created
        ]);

        if ($update) {
            return redirect()->route('urusan.index')->with('success', 'Data urusan berhasil disimpan');
        } else {
            return redirect()->route('urusan.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("main1_urusans")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('urusan.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('urusan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
