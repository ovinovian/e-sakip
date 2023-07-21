<?php

namespace App\Http\Controllers;

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
        // $collection = DB::table("main3_programs")->get();
        // $bidangs = DB::table("main2_bidangs")->get();
        return view('program.create', [
            'title' => 'Add Program',
            // 'programs' => $collection,
            // 'bidangs' => $bidangs,
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

        DB::table("main3_programs")->insert([
            "nama_program" => $request->nama_program,
            "kode_program" => $request->kode_program,
            "id_bidang" => $request->id_bidang
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
        // $collection = DB::table("main3_programs")->where('id', '=', $id)->get();
        // $bidangs = DB::table("main2_bidangs")->get();

        return view('program.edit', [
            'title' => 'Add Urusan',
            // 'programs' => $collection,
            // 'bidangs' => $bidangs,
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

        DB::table("main3_programs")->where('id', '=', $id)->insert([
            "nama_program" => $request->nama_program,
            "kode_program" => $request->kode_program,
            "id_bidang" => $request->id_bidang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("main3_programs")->where('id', '=', $id)->delete();
    }
}
