<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        // Validasi data menggunakan metode di model
        $validator = $profile->validate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika data valid, perbarui data ke dalam basis data
        $profile->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'universitas' => $request->universitas,
            'unit' => $request->unit,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
