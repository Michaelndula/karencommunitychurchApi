<?php

namespace App\Http\Controllers;

use App\Models\Clients;

use Illuminate\Http\Request;

class ClientsApiController extends Controller
{
    public function index()

    {
        return Clients::all();
    }

    public function store()

    {
        request()->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        return Clients::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
            'confirm_password' => request('confirm_password'),
        ]);
    }

    public function update(Clients $post)

    {
        request()->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $updated = $post->update([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
            'confirm_password' => request('confirm_password'),
        ]);

        return [
            'updated' => $updated
        ];
    }

    public function destroy(Clients $post)
    {
        $deleted = $post->delete();

        return [
            'deleted' => $deleted
        ];
    }
}
