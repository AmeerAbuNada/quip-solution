<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    public function getImageUrlAttribute()
    {
        return $this->value == null ? asset('landing-assets/images/ab-img.png') : Storage::url($this->value);
    }
}
