<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }*/

    public function login(Request $request)
    {
        $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string']
        );

        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            return response(['message' => 'Wrong email'], 401);
        }
        if (!Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Wrong password'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
