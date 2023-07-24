<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataTableController extends Controller
{

    public function urusans()
    {
        $collection = DB::table("main1_urusans")->orderBy('created_at', 'desc')->get();

        return datatables()->of($collection)
            ->addColumn('action', function($row) {
                return view('urusan.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function bidangs()
    {
        $collection = DB::table("main2_bidangs")
                        ->join('main1_urusans', 'main2_bidangs.id_urusan', '=', 'main1_urusans.id')
                        ->select('main2_bidangs.*', 'main1_urusans.nama_urusan')
                        ->orderBy('main2_bidangs.updated_at', 'desc')->get();

        return datatables()->of($collection)
            ->addColumn('action', function($row) {
                return view('bidang.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function programs()
    {
        $collection = DB::table("main3_programs")
                        ->join('main2_bidangs', 'main3_programs.id_bidang', '=', 'main2_bidangs.id')
                        ->select('main3_programs.*', 'main2_bidangs.nama_bidang')
                        ->orderBy('main3_programs.updated_at', 'desc')->get();

        return datatables()->of($collection)
            ->addColumn('action', function($row) {
                return view('program.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function kegiatans()
    {
        $collection = DB::table("main4_kegiatans")
                        ->join('main3_programs', 'main4_kegiatans.id_program', '=', 'main3_programs.id')
                        ->select('main4_kegiatans.*', 'main3_programs.nama_program')
                        ->orderBy('main4_kegiatans.updated_at', 'desc')->get();

        return datatables()->of($collection)
            ->addColumn('action', function($row) {
                return view('kegiatan.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function subkegiatans()
    {
        $collection = DB::table("main5_subkegiatans")
                        ->join('main4_kegiatans', 'main5_subkegiatans.id_kegiatan', '=', 'main4_kegiatans.id')
                        ->select('main5_subkegiatans.*', 'main4_kegiatans.nama_kegiatan')
                        ->orderBy('main5_subkegiatans.updated_at', 'desc')->get();

        return datatables()->of($collection)
            ->addColumn('action', function($row) {
                return view('subkegiatan.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }



}
