<?php

namespace App\Http\Controllers;

use App\Models\Rpjmd1_rpjmd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main()
    {
        $rpjmds = Rpjmd1_rpjmd::all()->sortDesc();

        return view('main', compact('rpjmds'));
    }

    public function mainDetail($id_rpjmd)
    {
        session()->put('id_rpjmd', $id_rpjmd);
        // dd(session('id_role'));
        if(session('id_role') == 1){
            return redirect()->route('rpjmd_i_misis', ['id' => $id]);
        }
        else if(session('id_role') == 2){
            return redirect()->route('rpjmds.index');
        }
        else if(session('id_role') == 3){
            return redirect()->route('renstra_i_tujuans', ['id' => $id_rpjmd]);
        }
    }
}
