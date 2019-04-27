<?php

namespace App\Http\Controllers;

use Exception;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index() {
        return view('pages.Admin.showUser');
    }

    public function create() {
        return view('pages.Admin.createUser');
    }

    public function store(Request $request) {
        try {
            // validate request
            $this->validate($request, [
                'nama_user' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'departemen' => 'required',
                'password' => 'confirmed|required'
            ]);
            // save it
            $data = $request->all();
            User::create($data);
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('users.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        $data = User::findOrFail($id);
        return view('pages.Admin.editUser', compact('data'));
    }

    public function update(Request $request, $id) {
        try {
            // validate request
            $this->validate($request, [
                'nama_user' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'departemen' => 'required',
                'password' => 'confirmed'
            ]);
            // save it
            $data = $request->all();
            $users = User::findOrFail($id);

            $users->password = !empty($data['password']) ? User::generatePassword($data['password']) : $users->password;
            $users->nama_user = $data['nama_user'];
            $users->email = $data['email'];
            $users->jabatan = $data['jabatan'];
            $users->departemen = $data['departemen'];
            $users->save();
            
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('users.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function getData() {
        $users = User::all()->toArray();
        return DataTables::of($users)
                ->addColumn('action', function ($u) {
                    return "<a href='". route('users.edit', $u['user_id']) ."' class='btn btn-primary'>Edit</a>";
                })->make();
    }
}
