<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menampilkan form tambah user oleh super admin
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan user baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Akun berhasil dibuat!');
    }


    // Menampilkan form edit user
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

// Memproses pembaruan data user (password dan role)
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'role' => ['required', 'string'],
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    // Password hanya diubah jika diisi oleh admin
    if ($request->filled('password')) {
        $request->validate([
            'password' => ['string', 'min:8'],
        ]);
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'Akun berhasil diperbarui!');
}
}