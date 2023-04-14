<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name_en',
        'name_ar',
        'sub_category_id',
        'catalog',
        'video_link',
        'is_active',
        'is_best_selling',
        'description_en',
        'description_ar',
        'features_en',
        'features_ar',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
}
