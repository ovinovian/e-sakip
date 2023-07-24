<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd3_misi;
use App\Models\Rpjmd4_tujuan;

use Illuminate\Http\Request;

class Rpjmd4TujuanController extends Controller
{
    //
    // private $type;

    //
    function __construct()
    {

    //     $this->middleware('permission:rpjmd-list|rpjmd-create|rpjmd-edit|rpjmd-delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:rpjmd-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:rpjmd-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:rpjmd-delete', ['only' => ['destroy']]);
    //     $this->middleware('permission:rpjmd-publish', ['only' => ['publish']]);

            // $this->type = 'rpjmds';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     return datatables(DataDb::query())
        //     ->toJson();
        // }        

        // return view($this->type . '.index', [
        //     'type' => $this->type,
        // ]);

        // $rpjmds = Rpjmd2_rpjmd::all();

        // $i = 0;
        
        // return view('rpjmds.index',compact('rpjmds','i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tujuan($id)
    {
        $rpjmd_misis = Rpjmd3_misi::where('id',$id)->first();
        $i = 0;
        $rpjmd_tujuans = Rpjmd4_tujuan::where('id_misi_rpjmd',$id)->get();

        return view('rpjmd_tujuans.index', compact('rpjmd_misis','rpjmd_tujuans','i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // return view('rpjmd_visis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add($id)
    {
        $rpjmd_misis = Rpjmd3_misi::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_tujuans.create',compact('rpjmd_misis'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_tujuan_rpjmd' => 'required',
            'id_misi_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd4_tujuan::create($validasi);
        
        $id = $request->id_misi_rpjmd;

        return redirect()->route('rpjmd_i_tujuans', ['id' => $id])
                        ->with('success','Tujuan RPJMD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd4_tujuan $rpjmd_tujuan)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd4_tujuan $rpjmd_tujuan)
    {
        $rpjmd_tujuans = Rpjmd4_tujuan::where('id', $rpjmd_tujuan->id)->get();
        
        $rpjmd_misis = Rpjmd3_misi::where('id', $rpjmd_tujuans[0]['id_misi_rpjmd'])->first();
        
        return view('rpjmd_tujuans.edit',compact('rpjmd_tujuans','rpjmd_misis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd4_tujuan $rpjmd_tujuan)
    {
        $validasi = request()->validate([
            'nama_tujuan_rpjmd' => 'required',
        ]);
        
        $rpjmd_tujuan->update($validasi);

        return redirect()->route('rpjmd_i_tujuans',['id'=> $rpjmd_tujuan->id_misi_rpjmd])
                        ->with('success','Tujuan RPJMD berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd4_tujuan $rpjmd_tujuan)
    {
        $rpjmd_misis = Rpjmd4_tujuan::where('id',$rpjmd_tujuan->id)->pluck('id_misi_rpjmd');
        
        $rpjmd_tujuan->delete();

        return redirect()->route('rpjmd_i_tujuans',['id'=> $rpjmd_misis[0]])
                        ->with('success','Tujuan RPJMD berhasil dihapus');
    }
}
