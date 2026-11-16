<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $fillable = ['heading', 'image', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    /** Seeded banners live in public/img, uploaded ones on the public disk. */
    public function getImageUrlAttribute(): string
    {
        return str_starts_with($this->image, 'img/') ? asset($this->image) : asset('storage/' . $this->image);
    }

    public function isUploaded(): bool
    {
        return !str_starts_with($this->image, 'img/');
    }

    public function deleteImageFile(): void
    {
        if ($this->isUploaded()) {
            Storage::disk('public')->delete($this->image);
        }
    }
}
