<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterApiController extends Controller
{

    public function index()

    {
        return Register::all();
    }

    public function store()
    {
        request()->validate([
            'First_name' => 'required',
            'Second_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        return Register::create([
            'First_name' => request('First_name'),
            'Second_name' => request('Second_name'),
            'email' => request('email'),
            'password' => request('password'),
            'confirm_password' => request('confirm_password'),
        ]);
    }

    public function update(Register $post)
    {
        request()->validate([
            'First_name' => 'required',
            'Second_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $success = $post->update([
            'First_name' => request('First_name'),
            'Second_name' => request('Second_name'),
            'email' => request('email'),
            'password' => request('password'),
            'confirm_password' => request('confirm_password'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Register $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
