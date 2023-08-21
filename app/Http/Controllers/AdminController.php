<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getDataAdmin()
    {
        $collection = DB::table("users as A")
            ->select('A.*', 'B.nama_opd', 'C.name as nama_role')
            ->join('opds as B', 'A.id_opd', '=', 'B.id')
            ->join('roles as C', 'A.id_role', '=', 'C.id')
            ->orderBy('A.updated_at', 'desc')
            ->get();

        return datatables()->of($collection)
            ->addColumn('action', function ($row) {
                return view('admin.action', ['id' => $row->id]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.index', [
            'title' => 'Admin'
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $opds = DB::table("opds")->get();

        return view('admin.create', [
            'title' => 'Admin OPD',
            'roles' => $roles,
            'opds' => $opds
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'id_role' => 'required',
            'id_opd' => 'required'
        ]);

        // dd($request->all());

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        if ($user) {
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
        } else {
            return redirect()->route('admin.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collection = DB::table("users")->where('id', '=', $id)->first();
        $opds = DB::table("opds")->get();

        $current_opd = DB::table("opds")
            ->where('id', '=', $collection->id_opd)
            ->select('opds.id', 'opds.nama_opd')
            ->first();

        $roles = DB::table("roles")->get();

        $current_role = DB::table("roles")
            ->where('id', '=', $collection->id_role)
            ->select('roles.id', 'roles.name')
            ->first();

        return view('admin.edit', [
            'title' => 'Add Admin',
            'admin' => $collection,
            'opds' => $opds,
            'roles' => $roles,
            'current_opd' => $current_opd,
            'current_role' => $current_role,
            'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'id_role' => 'required',
            'id_opd' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        $user = User::find($id);

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        if ($user) {
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
        } else {
            return redirect()->route('admin.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table("users")->where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->route('admin.index')->with('success_delete', 'Data berhasil dihapus');
        } else {
            return redirect()->route('admin.index')->with('error', 'Data gagal dihapus');
        }
    }
}
