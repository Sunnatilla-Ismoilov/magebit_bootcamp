<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register (Request $request) {
        // $validated = $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        if (User::create($request->post())) {
            return true;
        } else {
            return false;
        }
    }

    public function login (Request $request) {

        $user = User::where('email', $request->post('email'))->first();

        if ($user) {
            return ['userExists' => 'est', 'user' => $user];
        } else {
            return ['userExists' => 'net'];
        }
    }
}
