<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper {
  public static function settingValue($settings, $key) {
    $setting = $settings->where('key', $key)->first();
    if($setting) {
      if($setting->type == 'image') {
        return $setting->image_url;
      }
      if($setting->type == 'file') {
        return $setting->value == null ? null : Storage::url($setting->value);
      }
      return $setting->value;
    }
    return null;
  }
}