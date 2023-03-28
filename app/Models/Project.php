<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'is_active',
        'description_en',
        'description_ar',
    ];

    public function getImageUrlAttribute() {
        return Storage::url($this->image);
    }
}
