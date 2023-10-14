<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function UpdateProfilUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'photo_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo_profile')) {

            $request->validate([
                'photo_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if (!empty($user->photo_profile)) {
                if (file_exists(public_path('uploads/fotoProfil/' . $user->photo_profile))) {
                    unlink(public_path('uploads/fotoProfil/' . $user->photo_profile));
                }
            }

            $image = $request->file('photo_profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/fotoProfil'), $imageName);
            $validatedData['photo_profile'] = $imageName;
        }

        $user->update($validatedData);

        return redirect()->route('profiluser')->with('message', 'Profil Anda Berhasil Diperbaharui!');
    }
}
