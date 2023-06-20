<?php

namespace App\Http\Controllers;

use App\Models\User;    //Model = Untuk mengekusi database
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Departements;
use App\Models\Positions;
use Illuminate\Validation\Rule;
use PDF;


class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    // latihan tugas
    public function index()
    {
        $title = "Data User";
        $users = User::orderBy('id', 'asc')->get();
        return view('users.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = "Add Data user";
        $users = User::orderBy('id', 'asc')->get();
        $positions = Positions::all();
        $departements = Departements::all();
        return view('users.create', compact('users', 'title', 'positions', 'departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'positions' => 'required',
            'departements' => 'required',
        ]);

        user::create($request->post());

        return redirect()->route('users.index')->with('success', 'user has been created successfully.');
    }

    public function edit(User $user)
    {
        $title = "Edit Data user";
        $positions = Positions::all();
        $departements = Departements::all();
        return view('users.edit', compact('user', 'title', 'positions', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'positions' => 'required',
            'departements' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('success', 'user Has Been updated successfully');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user has been deleted successfully');
    }

    public function exportPDF()
    {
        // $users = User::all();
        // $pdf = PDF::loadView('users.pdf', compact('users'));

        // return $pdf->download('users.pdf');

        $title = "Laporan Data User";
        $users = User::orderBy('id', 'asc')->get();
        $pdf = PDF::loadview('users.pdf', compact(['users', 'title']));
        return $pdf->stream('laporan-user-pdf');
    }
}
