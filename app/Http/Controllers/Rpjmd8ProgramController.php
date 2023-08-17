<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd7_kebijakan;
use App\Models\Rpjmd8_program;

use Illuminate\Http\Request;

class Rpjmd8ProgramController extends Controller
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

    public function program($id)
    {
        $rpjmd_kebijakans = Rpjmd7_kebijakan::where('id',$id)->first();
        $i = 0;
        $rpjmd_programs = Rpjmd8_program::where('id_kebijakan_rpjmd',$id)->get();

        return view('rpjmd_programs.index', compact('rpjmd_kebijakans','rpjmd_programs','i'));
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
        $rpjmd_kebijakans = Rpjmd7_kebijakan::where('id', $id)->first();

        $i = 0;
        
        return view('rpjmd_programs.create',compact('rpjmd_kebijakans'));
    }
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'nama_program_rpjmd' => 'required',
            'id_kebijakan_rpjmd' => 'required',
        ]);

        // dd($request);
        
        Rpjmd8_program::create($validasi);
        
        $id = $request->id_kebijakan_rpjmd;

        return redirect()->route('rpjmd_i_programs', ['id' => $id])
                        ->with('success','Program RPJMD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function show(Rpjmd8_program $rpjmd_program)
    {
        // return view('rpjmds.show',compact('rpjmd'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Rpjmd8_program $rpjmd_program)
    {
        $rpjmd_programs = Rpjmd8_program::where('id', $rpjmd_program->id)->get();
        
        $rpjmd_kebijakans = Rpjmd7_kebijakan::where('id', $rpjmd_programs[0]['id_kebijakan_rpjmd'])->first();
        
        return view('rpjmd_programs.edit',compact('rpjmd_programs','rpjmd_kebijakans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd8_program $rpjmd_program)
    {
        $validasi = request()->validate([
            'nama_program_rpjmd' => 'required',
        ]);
        
        $rpjmd_program->update($validasi);

        return redirect()->route('rpjmd_i_programs',['id'=> $rpjmd_program->id_kebijakan_rpjmd])
                        ->with('success','Program RPJMD berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd8_program $rpjmd_program)
    {
        $rpjmd_kebijakans = Rpjmd8_program::where('id',$rpjmd_program->id)->pluck('id_kebijakan_rpjmd');
        
        $rpjmd_program->delete();

        return redirect()->route('rpjmd_i_programs',['id'=> $rpjmd_kebijakans[0]])
                        ->with('success','Program RPJMD berhasil dihapus');
    }
}
