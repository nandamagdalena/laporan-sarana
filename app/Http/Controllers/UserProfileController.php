<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('photo')) {

            // Hapus foto lama (optional tapi bagus)
            if ($user->photo && \Storage::disk('public')->exists($user->photo)) {
                \Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('profile', 'public');
            $user->photo = $path; // ← INI YANG BENAR
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return back()->with('success', 'Profile berhasil diperbarui!');
    }
}
