<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile.index');
    }

    public function edit($id)
    {
        $users=User::find($id);
        return view('profile.edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('profile.index')
                        ->with('success','Successfully updated Profile');
    }
}
