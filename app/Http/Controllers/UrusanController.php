<?php

namespace App\Http\Controllers;

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
        // $collection = DB::table("main1_urusans")->get();
        return view('urusan.create', [
            'title' => 'Add Urusan',
            // 'urusans' => $collection,
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

        DB::table("main1_urusans")->insert([
            "nama_urusan" => $request->nama_urusan,
            "kode_urusan" => $request->kode_urusan
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
        // $collection = DB::table("main1_urusans")->where('id', '=', $id)->get();


        return view('urusan.edit', [
            'title' => 'Add Urusan',
            // 'urusans' => $collection,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_urusan' => 'String',
            'kode_urusan' => 'String',
        ]);

        DB::table("main1_urusans")->where('id', '=', $id)->update([
            "nama_urusan" => $request->nama_urusan,
            "kode_urusan" => $request->kode_urusan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("main1_urusans")->where('id', '=', $id)->delete();
    }
}
