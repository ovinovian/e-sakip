<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd4_tujuan;
use App\Models\Rpjmd5_sasaran;
use App\Models\Satuan;
use App\Models\Vw_rpjmd5_sasaran;
use App\Models\Vw_rpjmd5_sasaran_indikator;

use Illuminate\Http\Request;

class Rpjmd5SasaranController extends Controller
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

    public function sasaran($id)
    {
        $rpjmd_tujuans = Rpjmd4_tujuan::where('id',$id)->first();
        $i = 0;
        $rpjmd_sasarans = Vw_rpjmd5_sasaran::where('id_tujuan_rpjmd',$id)->get();

        return view('rpjmd_sasarans.index', compact('rpjmd_tujuans','rpjmd_sasarans','i'));
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
        $rpjmd_tujuans = Rpjmd4_tujuan::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_sasarans.create',compact('rpjmd_tujuans'));
    }

    public function add_indikator($id)
    {
        $rpjmd_sasarans = Rpjmd5_sasaran::where('id', $id)->first();
        $satuans = Satuan::all();
        
        $i = 0;
        
        return view('rpjmd_sasarans.createindikator',compact('rpjmd_sasarans','satuans'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_sasaran_rpjmd' => 'required',
            'id_tujuan_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd5_sasaran::create($validasi);
        
        $id = $request->id_tujuan_rpjmd;

        return redirect()->route('rpjmd_i_sasarans', ['id' => $id])
                        ->with('success','Sasaran RPJMD berhasil ditambahkan.');
    }

    public function store_indikator(Request $request)
    {
        $validasi = request()->validate([
            'nama_tujuan_indikator_rpjmd' => 'required',
            'id_tujuan_rpjmd' => 'required',
            'id_satuan' => 'required',
        ]);

        $id = (Rpjmd4_tujuan::where('id',$request->id_tujuan_rpjmd)->first('id'))->id;
        
        Rpjmd4_tujuan_indikator::create($validasi);

        return redirect()->route('rpjmd_i_tujuans', ['id' => $request->id_misi_rpjmd])
                        ->with('success','Indikator Tujuan RPJMD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd5_sasaran $rpjmd_sasaran)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd5_sasaran $rpjmd_sasaran)
    {
        $rpjmd_sasarans = Rpjmd5_sasaran::where('id', $rpjmd_sasaran->id)->get();
        
        $rpjmd_tujuans = Rpjmd4_tujuan::where('id', $rpjmd_sasarans[0]['id_tujuan_rpjmd'])->first();
        
        return view('rpjmd_sasarans.edit',compact('rpjmd_sasarans','rpjmd_tujuans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd5_sasaran $rpjmd_sasaran)
    {
        $validasi = request()->validate([
            'nama_sasaran_rpjmd' => 'required',
        ]);
        
        $rpjmd_sasaran->update($validasi);

        return redirect()->route('rpjmd_i_sasarans',['id'=> $rpjmd_sasaran->id_tujuan_rpjmd])
                        ->with('success','Sasaran RPJMD berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd5_sasaran $rpjmd_sasaran)
    {
        $rpjmd_tujuans = Rpjmd5_sasaran::where('id',$rpjmd_sasaran->id)->pluck('id_tujuan_rpjmd');
        
        $rpjmd_sasaran->delete();

        return redirect()->route('rpjmd_i_sasarans',['id'=> $rpjmd_tujuans[0]])
                        ->with('success','Sasaran RPJMD berhasil dihapus');
    }
}