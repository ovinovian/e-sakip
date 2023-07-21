<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd1_rpjmd;
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

        $rpjmds = Rpjmd1_rpjmd::all();

        $i = 0;
        
        return view('rpjmds.index',compact('rpjmds','i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('rpjmds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $validasi = request()->validate([
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
        ]);

        // dd($request);

        Rpjmd1_rpjmd::create($validasi);
        return redirect()->route('rpjmds.index')
                        ->with('success','Rpjmd berhasil ditambahkan.');
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
    
    public function edit(Rpjmd1_rpjmd $rpjmd)
    {
        return view('rpjmds.edit',compact('rpjmd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Rpjmd1_rpjmd $rpjmd)
    {
        $validasi = request()->validate([
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
        ]);

        $rpjmd->update($validasi);
        return redirect()->route('rpjmds.index')
                        ->with('success','Rpjmd berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rpjmd1_rpjmd  $rpjmd
     * @return \Illuminate\Http\Response
     */

    public function destroy(Rpjmd1_rpjmd $rpjmd)
    {
        $rpjmd->delete();

        return redirect()->route('rpjmds.index')
                        ->with('success','Rpjmd berhasil dihapus');
    }

    public function publishrpjmd($id)
    {
        Rpjmd1_rpjmd::where('id', $id)->update(['publish' => 1]);
    
        return redirect()->route('rpjmds.index')
                        ->with('success','rpjmd berhasil dipublish');
    }
}
