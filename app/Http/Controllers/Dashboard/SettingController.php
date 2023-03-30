<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function general()
    {
        $settings = Setting::where('group', 'general')->get();
        $title = __('navbar.general_settings');
        return response()->view('dashboard.settings.settings', compact('settings', 'title'));
    }

    public function home()
    {
        $settings = Setting::where('group', 'home')->get();
        $title = __('navbar.home_page_settings');
        return response()->view('dashboard.settings.settings', compact('settings', 'title'));
    }

    public function update(Request $request)
    {
        $validationResult = $this->validateSettings($request);
        if ($validationResult[0]) {
            try {
                DB::beginTransaction();
                foreach ($request->all() as $key => $value) {
                    $setting = Setting::where('key', $key)->first();
                    if ($setting->type == 'image' || $setting->type == 'file') {
                        if ($request->hasFile($key)) {
                            if ($setting->value != null) {
                                Storage::disk('public')->delete('' . $setting->value);
                            }
                            $file = $request->file($key);
                            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                            $image = $file->storePubliclyAs('files/settings', $imageName, ['disk' => 'public']);
                            $setting->value = $image;
                        }
                    } else {
                        $setting->value = $request->get($key);
                    }
                    $setting->save();
                }
                DB::commit();
                return response()->json([
                    'message' => 'Settings Updated Successfully!',
                ], Response::HTTP_OK);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Something went wrong, Please try again.',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validationResult[1],
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function validateSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                if ($setting->type == 'image') {
                    $validator = Validator($request->all(), [
                        $key => 'nullable|image',
                    ]);
                    if ($validator->fails()) {
                        return [false, $validator->getMessageBag()->first()];
                    }
                } else if ($setting->type == 'file') {
                    $validator = Validator($request->all(), [
                        $key => 'nullable|file',
                    ]);
                    if ($validator->fails()) {
                        return [false, $validator->getMessageBag()->first()];
                    }
                } else {
                    $validator = Validator($request->all(), [
                        $key => 'required|string',
                    ]);
                    if ($validator->fails()) {
                        return [false, $validator->getMessageBag()->first()];
                    }
                }
            } else {
                return [false, 'Wrong Data, Please refresh the page and try again.'];
            }
        }
        return [true, 'success'];
    }
}
