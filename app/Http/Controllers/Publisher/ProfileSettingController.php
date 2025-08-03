<?php

namespace App\Http\Controllers\Publisher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class ProfileSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user || $user->system_admin !== 'publisher') {
            abort(403, 'Unauthorized access.');
        }
        return view('publisher.layouts.pages.profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'identity' => 'nullable|string|max:255',
            'website_url' => 'nullable|url',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'website_url' => $request->website_url,
            'identity' => $request->identity,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully!',
        ]);
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        $publisherProfileImage = $this->publisherImage($request); // returns image path
        if ($publisherProfileImage) {
            // Delete old image
            if ($user->image) {
                $oldPublisherImage = public_path($user->image);
                if (file_exists($oldPublisherImage)) {
                    unlink($oldPublisherImage);
                }
            }

            // Update image path in DB
            $user->update([
                'image' => $publisherProfileImage,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Profile image updated successfully!',
                'image_url' => asset($publisherProfileImage), // Correct image URL
            ]);
        }

        return response()->json(
            [
                'status' => 'error',
                'message' => 'Image upload failed.',
            ],
            422,
        );
    }


public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = auth()->user();

    // Check current password
    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Current password is incorrect.'
        ]);
    }

    // Update new password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Password updated successfully!'
    ]);

}



    public function publisherLogout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginForm');
    }

    private function publisherImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/publisher-image/');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->save($destinationPath . $imageName);

            return 'uploads/publisher-image/' . $imageName; // Return relative path
        }

        return null;
    }
}
