<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd2_visi;
use App\Models\Rpjmd3_misi;
use Illuminate\Http\Request;

class Rpjmd3MisiController extends Controller
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

    public function misi($id)
    {
        $rpjmd_visis = Rpjmd2_visi::where('id',$id)->first();
        $i = 0;
        $rpjmd_misis = Rpjmd3_misi::where('id_visi_rpjmd',$id)->get();

        return view('rpjmd_misis.index', compact('rpjmd_visis','rpjmd_misis','i'));
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
        $rpjmd_visis = Rpjmd2_visi::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_misis.create',compact('rpjmd_visis'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_misi_rpjmd' => 'required',
            'id_visi_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd3_misi::create($validasi);
        
        $id = $request->id_visi_rpjmd;

        // $rpjmds = Rpjmd1_rpjmd::where('id',$id)->get();
        // $i = 0;
        // $rpjmd_visis = Rpjmd2_visi::where('id_rpjmd',$id)->get();

        return redirect()->route('rpjmd_i_misis', ['id' => $id])
                        ->with('success','Misi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd2_visi $rpjmd_misi)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd3_misi $rpjmd_misi)
    {
        $rpjmd_misis = Rpjmd3_misi::where('id', $rpjmd_misi->id)->get();
        
        $rpjmd_visis = Rpjmd2_visi::where('id', $rpjmd_misis[0]['id_visi_rpjmd'])->first();
        
        return view('rpjmd_misis.edit',compact('rpjmd_misis','rpjmd_visis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd3_misi $rpjmd_misi)
    {
        $validasi = request()->validate([
            'nama_misi_rpjmd' => 'required',
        ]);
        
        // $rpjmd = Rpjmd1_rpjmd::where('id',$rpjmd_visi->id_rpjmd);

        $rpjmd_misi->update($validasi);

        return redirect()->route('rpjmd_i_misis',['id'=> $rpjmd_misi->id_visi_rpjmd])
                        ->with('success','Misi RPJMD berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd3_misi $rpjmd_misi)
    {
        $rpjmd_visis = Rpjmd3_misi::where('id',$rpjmd_misi->id)->pluck('id_visi_rpjmd');
        
        $rpjmd_misi->delete();

        return redirect()->route('rpjmd_i_misis',['id'=> $rpjmd_visis[0]])
                        ->with('success','Misi RPJMD berhasil dihapus');
    }
}
