<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data user berhasil ditambahkan',
            ]);
        }
    }

    public function fetchusers()
    {
        $users = User::all();
        return response()->json([
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Data tidak ditemukan",
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $user = User::find($id);
            if ($user) {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Data user berhasil diupdate',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Data tidak ditemukan",
                ]);
            }
        }
    }

    public function qrcode ($id)
    {
        $user = User::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($user->name);
        return view('qrcode',compact('qrcode'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => "Data berhasil dihapus",
        ]);
    }
}
