<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd6_strategi;
use App\Models\Rpjmd7_kebijakan;
use App\Models\Vw_rpjmd7_kebijakan;

use Illuminate\Http\Request;

class Rpjmd7KebijakanController extends Controller
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

    public function kebijakan($id)
    {
        $rpjmd_strategis = Rpjmd6_strategi::where('id',$id)->first();
        $i = 0;
        $rpjmd_kebijakans = Vw_rpjmd7_kebijakan::where('id_strategi_rpjmd',$id)->get();

        return view('rpjmd_kebijakans.index', compact('rpjmd_strategis','rpjmd_kebijakans','i'));
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
        $rpjmd_strategis = Rpjmd6_strategi::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_kebijakans.create',compact('rpjmd_strategis'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_kebijakan_rpjmd' => 'required',
            'id_strategi_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd7_kebijakan::create($validasi);
        
        $id = $request->id_strategi_rpjmd;

        return redirect()->route('rpjmd_i_kebijakans', ['id' => $id])
                        ->with('success','Kebijakan RPJMD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd7_kebijakan $rpjmd_kebijakan)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd7_kebijakan $rpjmd_kebijakan)
    {
        $rpjmd_kebijakans = Rpjmd7_kebijakan::where('id', $rpjmd_kebijakan->id)->get();
        
        $rpjmd_strategis = Rpjmd6_strategi::where('id', $rpjmd_kebijakans[0]['id_strategi_rpjmd'])->first();
        
        return view('rpjmd_kebijakans.edit',compact('rpjmd_kebijakans','rpjmd_strategis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd7_kebijakan $rpjmd_kebijakan)
    {
        $validasi = request()->validate([
            'nama_kebijakan_rpjmd' => 'required',
        ]);
        
        $rpjmd_kebijakan->update($validasi);

        return redirect()->route('rpjmd_i_kebijakans',['id'=> $rpjmd_kebijakan->id_strategi_rpjmd])
                        ->with('success','Kebijakan RPJMD berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd7_kebijakan $rpjmd_kebijakan)
    {
        $rpjmd_strategis = Rpjmd7_kebijakan::where('id',$rpjmd_kebijakan->id)->pluck('id_strategi_rpjmd');
        
        $rpjmd_kebijakan->delete();

        return redirect()->route('rpjmd_i_kebijakans',['id'=> $rpjmd_strategis[0]])
                        ->with('success','Kebijakan RPJMD berhasil dihapus');
    }
}
