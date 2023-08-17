<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('opd.index', [
            'title' => 'Organisasi Perangkat Daerah'
        ]);
    }

    public function getDataOpd()
    {
        $collection = DB::table("opds as A")
                        ->select('A.*', 'B.nama_urusan', 'C.nama_bidang')
                        ->join('main1_urusans as B', 'A.id_urusan', '=', 'B.id')
                        ->join('main2_bidangs as C', 'A.id_bidang', '=', 'C.id')
                        ->orderBy('A.updated_at', 'desc')
                        ->get();

        return datatables()->of($collection)
            ->addColumn('opd', function($row) {
                return "<div class='opd-container'><div class='opd-line'><span class='opd-label'>Nama OPD  &nbsp;: &nbsp;</span><span class='opd-content'>".$row->nama_opd."</span></div><div class='opd-line'><span class='opd-label'>Kode OPD  &nbsp; &nbsp;: &nbsp;</span><span class='opd-content'>".$row->kode_opd."</span></div></div>";
            })
            ->addColumn('sub_opd', function($row) {
                return "<div class='opd-container'><div class='opd-line'><span class='opd-label'>Nama OPD  &nbsp;: &nbsp;</span><span class='opd-content'>".$row->nama_sub_opd."</span></div><div class='opd-line'><span class='opd-label'>Kode OPD  &nbsp; &nbsp;: &nbsp;</span><span class='opd-content'>".$row->kode_sub_opd."</span></div></div>";
            })            
            ->addColumn('action', function($row) {
                return view('opd.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['opd', 'sub_opd', 'action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $urusans = DB::table("main1_urusans")->get();
        $bidangs = DB::table("main2_bidangs")->get();
        return view('opd.create', [
            'title' => 'Tambah OPD',
            'urusans' => $urusans,
            'bidangs' => $bidangs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataLama = DB::table("opds")->get();

        $this->validate($request, [
            'nama_opd' => 'required',
            'kode_opd' => 'required',
            'nama_sub_opd' => 'required',
            'kode_sub_opd' => 'required',
            'status_opd' => 'required',
            'id_urusan' => 'required',
            'id_bidang' => 'required',

        ]);

        foreach ($dataLama as $item) {
            // dd($item->nama_opd);
            if ($item->nama_opd == $request->nama_opd ) {
                return back()->with('error', 'Nama OPD Sudah Digunakan');
            } elseif ($item->kode_opd == $request->kode_opd) {
                return back()->with('error', 'Kode OPD Sudah Digunakan');
            } elseif ($item->nama_sub_opd == $request->nama_sub_opd) {
                return back()->with('error', 'Nama Sub OPD Sudah Digunakan');
            } elseif ($item->kode_sub_opd == $request->kode_sub_opd) {
                return back()->with('error', 'Kode Sub OPD Sudah Digunakan');
            } else {
                $created = Carbon::now();

                $save = DB::table("opds")->insert([
                    "nama_opd" => $request->nama_opd,
                    "kode_opd" => $request->kode_opd,
                    "nama_sub_opd" => $request->nama_sub_opd,
                    "kode_sub_opd" => $request->kode_sub_opd,
                    "status_opd" => $request->status_opd,
                    "id_urusan" => $request->id_urusan,
                    "id_bidang" => $request->id_bidang,
                    "created_at" => $created,
                    "updated_at" => $created
                ]);

                if ($save) {
                    return redirect()->route('opd.index')->with('success', 'Data OPD berhasil disimpan');
                } else {
                    return redirect()->route('opd.index')->with('error', 'Data gagal disimpan');
                }
            }
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
        $collection = DB::table("opds")->where('id', '=', $id)->first();
        $urusans = DB::table("main1_urusans")->get();
        $bidangs = DB::table("main2_bidangs")->get();

        $current_urusan = DB::table("main1_urusans")
                ->where('id', '=', $collection->id_urusan)
                ->select('main1_urusans.id', 'main1_urusans.nama_urusan')
                ->first();

        $current_bidang = DB::table("main2_bidangs")
                ->where('id', '=', $collection->id_bidang)
                ->select('main2_bidangs.id', 'main2_bidangs.nama_bidang')
                ->first();

        return view('opd.edit', [
            'title' => 'Add Kegiatan',
            'opds' => $collection,
            'urusans' => $urusans,
            'current_urusan' => $current_urusan,
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
            $dataLama = DB::table("opds")->get();
            
            $this->validate($request, [
                'nama_opd' => 'required',
                'kode_opd' => 'required',
                'nama_sub_opd' => 'required',
                'kode_sub_opd' => 'required',
                'status_opd' => 'required',
                'id_urusan' => 'required',
                'id_bidang' => 'required',
            ]);

            // dd($dataLama);
            foreach ($dataLama as $item) {
                // dd($item->nama_opd);
                if ($item->nama_opd == $request->nama_opd ) {
                    return back()->with('error', 'Nama OPD Sudah Digunakan');
                } elseif ($item->kode_opd == $request->kode_opd) {
                    return back()->with('error', 'Kode OPD Sudah Digunakan');
                } elseif ($item->nama_sub_opd == $request->nama_sub_opd) {
                    return back()->with('error', 'Nama Sub OPD Sudah Digunakan');
                } elseif ($item->kode_sub_opd == $request->kode_sub_opd) {
                    return back()->with('error', 'Kode Sub OPD Sudah Digunakan');
                } else {
                    $created = Carbon::now();

                    $update = DB::table("opds")->where('id', '=', $id)->update([
                        "nama_opd" => $request->nama_opd,
                        "kode_opd" => $request->kode_opd,
                        "nama_sub_opd" => $request->nama_sub_opd,
                        "kode_sub_opd" => $request->kode_sub_opd,
                        "status_opd" => $request->status_opd,
                        "id_urusan" => $request->id_urusan,
                        "id_bidang" => $request->id_bidang,
                        "updated_at" => $created
                    ]);

                    if ($update) {
                        return redirect()->route('opd.index')->with('success', 'Data OPD berhasil disimpan');
                    } else {
                        return redirect()->route('opd.index')->with('error', 'Data gagal disimpan');
                    }
                }
            }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("opds")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('opd.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('opd.index')->with('error', 'Data gagal dihapus');
        }
    }
}
