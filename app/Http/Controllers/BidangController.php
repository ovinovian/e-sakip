<?php

namespace App\Http\Controllers;

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
        // $collection = DB::table("main2_bidangs")->get();
        // $urusans = DB::table("main1_urusans")->get();
        return view('bidang.create', [
            'title' => 'Add Bidang',
            // 'bidangs' => $collection,
            // 'urusans' => $urusans,
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
        ]);

        DB::table("main2_bidangs")->insert([
            "nama_bidang" => $request->nama_bidang,
            "kode_bidang" => $request->kode_bidang,
            "id_urusan" => $request->id_urusan
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
        // $collection = DB::table("main2_bidangs")->where('id', '=', $id)->get();
        // $urusans = DB::table("main1_urusans")->get();


        return view('bidang.edit', [
            'title' => 'Add Urusan',
            // 'bidangs' => $collection,
            // 'urusans' => $urusans,
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

        DB::table("main2_bidangs")->where('id', '=', $id)->update([
            "nama_bidang" => $request->nama_bidang,
            "kode_bidang" => $request->kode_bidang,
            "id_urusan" => $request->id_urusan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("main2_bidangs")->where('id', '=', $id)->delete();
    }
}
