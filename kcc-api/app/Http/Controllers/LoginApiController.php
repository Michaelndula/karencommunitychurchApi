<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Illuminate\Http\Request;

class LoginApiController extends Controller
{
    public function index()

    {
        return Login::all();
    }

    public function store()

    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        return Login::create([
            'email' => request('email'),
            'password' => request('password'),
        ]);
    }

    public function update(Login $post)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $updated = $post->update([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        return [
            'updated' => $updated
        ];
    }

    public function destroy(Login $post)
    {
        $deleted = $post->delete();

        return [
            'deleted' => $deleted
        ];
    }
}
