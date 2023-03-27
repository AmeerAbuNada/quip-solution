<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangeEmailRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\SaveSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
  public function profile()
  {
    return response()->view('dashboard.account.profile');
  }

  public function settings()
  {
    return response()->view('dashboard.account.settings');
  }

  public function saveSettings(SaveSettingsRequest $request)
  {
    $user = $request->user();
    $user->name = $request->input('name');
    if ($request->hasFile('image')) {
      if ($user->image != null) {
        Storage::disk('public')->delete('' . $user->image);
      }
      $file = $request->file('image');
      $imageName = time() . '_' . $user->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
      $image = $file->storePubliclyAs('files/admins', $imageName, ['disk' => 'public']);
      $user->image = $image;
    }
    $isSaved = $user->save();
    return response()->json([
      'message' => $isSaved ? 'Settings Saved Successfully!' : 'Failed to save settings, Please try again.',
    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
  }

  public function changeEmail(ChangeEmailRequest $request)
  { 
    $user = $request->user();
    if ($request->input('email') == $user->email) {
      return response()->json([
        'message' => 'You didn\'t change the email address.',
      ], Response::HTTP_BAD_REQUEST);
    }
    $user->email = $request->input('email');
    $isSaved = $user->save();
    return response()->json([
      'message' => $isSaved ? 'Email Changed Successfully!' : 'Failed to change email, Please try again.',
    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
  }

  public function changePassword(ChangePasswordRequest $request)
  {
    $user = $request->user();
    $user->password = Hash::make($request->input('new_password'));
    $isSaved = $user->save();
    return response()->json([
      'message' => $isSaved ? 'Password Changed Successfully!' : 'Failed to change password, Please try again.',
    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
  }
}
