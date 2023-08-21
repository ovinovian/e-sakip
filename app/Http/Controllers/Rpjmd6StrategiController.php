<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd5_sasaran;
use App\Models\Rpjmd6_strategi;
use App\Models\Vw_rpjmd6_strategi;

use Illuminate\Http\Request;

class Rpjmd6StrategiController extends Controller
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

    public function strategi($id)
    {
        $rpjmd_sasarans = Rpjmd5_sasaran::where('id',$id)->first();
        $i = 0;
        $rpjmd_strategis = Vw_rpjmd6_strategi::where('id_sasaran_rpjmd',$id)->get();

        return view('rpjmd_strategis.index', compact('rpjmd_sasarans','rpjmd_strategis','i'));
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
        $rpjmd_sasarans = Rpjmd5_sasaran::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_strategis.create',compact('rpjmd_sasarans'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_strategi_rpjmd' => 'required',
            'id_sasaran_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd6_strategi::create($validasi);
        
        $id = $request->id_sasaran_rpjmd;

        return redirect()->route('rpjmd_i_strategis', ['id' => $id])
                        ->with('success','Strategi RPJMD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd6_strategi $rpjmd_strategi)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd6_strategi $rpjmd_strategi)
    {
        $rpjmd_strategis = Rpjmd6_strategi::where('id', $rpjmd_strategi->id)->get();
        
        $rpjmd_sasarans = Rpjmd5_sasaran::where('id', $rpjmd_strategis[0]['id_sasaran_rpjmd'])->first();
        
        return view('rpjmd_strategis.edit',compact('rpjmd_strategis','rpjmd_sasarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd6_strategi $rpjmd_strategi)
    {
        $validasi = request()->validate([
            'nama_strategi_rpjmd' => 'required',
        ]);
        
        $rpjmd_strategi->update($validasi);

        return redirect()->route('rpjmd_i_strategis',['id'=> $rpjmd_strategi->id_sasaran_rpjmd])
                        ->with('success','Tujuan RPJMD berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd6_strategi $rpjmd_strategi)
    {
        $rpjmd_sasarans = Rpjmd6_strategi::where('id',$rpjmd_strategi->id)->pluck('id_sasaran_rpjmd');
        
        $rpjmd_strategi->delete();

        return redirect()->route('rpjmd_i_strategis',['id'=> $rpjmd_sasarans[0]])
                        ->with('success','Strategi RPJMD berhasil dihapus');
    }
}
