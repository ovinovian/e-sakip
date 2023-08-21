<?php

namespace App\Http\Controllers;

use App\Models\Renstra1_tujuan;
use App\Models\Rpjmd1_rpjmd;
use App\Models\Rpjmd2_visi;
use App\Models\Rpjmd3_misi;

use Illuminate\Http\Request;

class Renstra1TujuanController extends Controller
{
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
    
    public function index()
    {
        $rpjmd_visis = Rpjmd2_visi::all();
        
        $i = 0;
        
        return view('rpjmd_visis.index_all', compact('rpjmd_visis','i'));
    }

    public function tujuan($id)
    {
        $rpjmds = Rpjmd1_rpjmd::where('id',$id)->first();
        
        $i = 0;
        
        $rpjmd_visis = Rpjmd2_visi::where('id_rpjmd',$id)->get();
        
        return view('rpjmd_visis.index', compact('rpjmds','rpjmd_visis','i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('rpjmd_visis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add($id)
    {
        $rpjmds = Rpjmd1_rpjmd::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_visis.create',compact('rpjmds'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_visi_rpjmd' => 'required',
            'id_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd2_visi::create($validasi);
        
        $id = $request->id_rpjmd;

        // $rpjmds = Rpjmd1_rpjmd::where('id',$id)->get();
        // $i = 0;
        // $rpjmd_visis = Rpjmd2_visi::where('id_rpjmd',$id)->get();

        return redirect()->route('rpjmd_i_visis', ['id' => $id])
                        ->with('success','Visi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd1_rpjmd $rpjmd)
    {
        return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd2_visi $rpjmd_visi)
    {
        $rpjmd_visis = Rpjmd2_visi::where('id', $rpjmd_visi->id)->get();
        
        $rpjmd = Rpjmd1_rpjmd::where('id', $rpjmd_visis[0]['id_rpjmd'])->first();
        
        return view('rpjmd_visis.edit',compact('rpjmd_visis','rpjmd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd2_visi $rpjmd_visi)
    {
        $validasi = request()->validate([
            'nama_visi_rpjmd' => 'required',
        ]);
        
        // $rpjmd = Rpjmd1_rpjmd::where('id',$rpjmd_visi->id_rpjmd);

        $rpjmd_visi->update($validasi);

        return redirect()->route('rpjmd_i_visis',['id'=> $rpjmd_visi->id_rpjmd])
                        ->with('success','Visi RPJMD berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd2_visi $rpjmd_visi)
    {
        $rpjmd = Rpjmd2_visi::where('id',$rpjmd_visi->id)->pluck('id_rpjmd');
        
        $rpjmd_visi->delete();

        return redirect()->route('rpjmd_i_visis',['id'=> $rpjmd[0]])
                        ->with('success','Visi RPJMD berhasil dihapus');
    }
}
