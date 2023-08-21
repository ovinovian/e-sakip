<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rpjmd1_rpjmd;
use App\Models\User;

use Illuminate\Http\Request;

// class LoginController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         // $this->middleware('auth');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         return view('auth.login');
//     }

//     public function login()
//     {
//         $validasi = request()->validate([
//             'username' => 'required',
//             'password' => 'required',
//         ]);

//         // dd($request);

//         $save = Rpjmd1_rpjmd::create($validasi);
        
//         if ($save) {
//             return redirect()->route('rpjmds.index')->with('success', 'RPJMD berhasil disimpan');
//         } else {
//             return redirect()->route('rpjmds.index')->with('error', 'RPJMD gagal disimpan');
//         }
//     }
// }

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
        $rpjmds = Rpjmd1_rpjmd::all()->sortDesc();

        return view('auth.login',compact('rpjmds'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $data = User::where('email',$request->email)->first();
            $request->session()->put('id_opd', $data->id_opd);
            $request->session()->put('id_role', $data->id_role);

            // return redirect()->intended('home');
            return redirect()->route('main-index');
        };

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        if(session()->has('id_opd')){
            request()->session()->pull('id_opd');
        }
        if(session()->has('id_role')){
            request()->session()->pull('id_role');
        }
        
        return redirect('/');
    }
}

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

// class LoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }
// }
